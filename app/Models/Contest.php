<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;

class Contest extends Model
{

    use Searchable;

    protected $fillable = [
        'name',
        'contest_day_id',
        'start_time',
        'end_time',
        'participants_limit',
        'wrong_solution_penalty',
        'freeze_leaderboard_at',
        'leaderboard_unfrozen',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'freeze_leaderboard_at' => 'datetime',
    ];

    public function contestDay(): BelongsTo
    {
        return $this->belongsTo(ContestDay::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function isLeaderboardFrozenAttribute(): bool
    {
        if ($this->freeze_leaderboard_at === null) return false;
        if ($this->freeze_leaderboard_at->isFuture()) return true;

        return $this->leaderboard_unfrozen;
    }

    public function getThemeVariablesAttribute(): string
    {
        return $this->contestDay->theme->variables;
    }

    public function getLeaderboard(bool $ignoreFreeze = false): Collection
    {
        $sortedLeaderboard = Contest::whereId($this->id)->with([
            'teams',
            'teams.contest',
            'teams.contest.contestDay',
            'teams.levelSubmissions',
            'teams.levelSubmissions.team',
            'teams.levelSubmissions.team.contest',
            'teams.levelSubmissions.team.contest.contestDay',
            'teams.levelSubmissions.level',
            'teams.levelSubmissions.level.task',
            'teams.levelSubmissions.level.task.contest',
        ])
            ->first()
            ->teams
            ->filter(fn($team) => !$team->contest->contestDay->training_only)
            ->map(fn($team) => collect([
                'name' => $team->name,
                'team_id' => $team->id,
                'points' => $team->getPoints($ignoreFreeze),
                'total_resolution_time' => $team->getTotalResolutionTime($ignoreFreeze),
            ]))
            ->filter(fn($team) => $team['points'] !== null && $team['total_resolution_time'] !== null)
            ->sortBy('name')
            ->sortBy('total_resolution_time')
            ->sortByDesc('points');

        $leaderboard = collect();
        $place = 1;
        $newPlace = 1;
        $previousPoints = $sortedLeaderboard->first()?->get('points');
        $previousTotalResolutionTime = $sortedLeaderboard->first()?->get('total_resolution_time');

        foreach ($sortedLeaderboard as $team) {
            if ($team['points'] !== $previousPoints || $team['total_resolution_time'] !== $previousTotalResolutionTime) {
                $place = $newPlace;
            }

            $leaderboard->push(collect([
                'place' => $place,
                'name' => $team->get('name'),
                'team_id' => $team->get('team_id'),
                'points' => $team->get('points'),
                'total_resolution_time' => $team->get('total_resolution_time'),
                'human_friendly_total_resolution_time' => human_friendly_seconds($team->get('total_resolution_time')),
            ]));

            $previousPoints = $team['points'];
            $previousTotalResolutionTime = $team['total_resolution_time'];

            $newPlace++;
        }

        return $leaderboard;
    }

    public function generateTeams(): void
    {
        $users = $this->users()
            ->whereDoesntHave('teams', fn($query) => $query->where('contest_id', $this->id))
            ->get()
            ->merge($this->users()
                ->whereHas('teams', fn($query) => $query->where('contest_id', $this->id))
                ->get()
                ->filter(fn(User $user) => $user->getTeamForContest($this)->users->count() === 1)
                ->each(fn(User $user) => $user->getTeamForContest($this)->delete()))
            ->shuffle()
            ->chunk(4);

        if ($users->last()->count() < 3 && $users->count() > 1) {
            $last = $users->pop();
            $secondLast = $users->pop();

            $moved = $secondLast->pop();
            $last->push($moved);

            $users->push($secondLast);
            $users->push($last);
        }

        $users->each(fn ($team, $index) => Team::fromRandom($this, $team, $index + 1));
    }

    public function getMaxPoints(): int {
        return $this->tasks
            ->flatMap(fn (Task $task) => $task->levels)
            ->map(fn (Level $level) => $level->points)
            ->sum();
    }


    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

}
