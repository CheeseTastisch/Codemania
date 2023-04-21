<?php

namespace App\Models;

use Cache;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Laravel\Scout\Searchable;

class Contest extends Model
{

    use Searchable;

    protected $fillable = [
        'name',
        'contest_day_id',
        'start_time',
        'end_time',
        'wrong_solution_penalty',
        'freeze_leaderboard_at',
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

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
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
        $usedContest = Contest::whereId($this->id)->with(
            [
                'tasks',
                'tasks.levels',
                'tasks.levels.levelSubmissions',
                'teams',
                'teams.contests',
                'teams.contests.tasks',
                'teams.contests.tasks.levels',
                'teams.contests.tasks.levels.levelSubmissions',
            ])->first();

        return $usedContest->teams->map(function ($team) use ($usedContest, $ignoreFreeze) {
            $total_resolution_time = $team->getTotalResolutionTime($usedContest, $ignoreFreeze);
            return [
                'name' => $team->name,
                'points' => $team->getPoints($usedContest, $ignoreFreeze),
                'total_resolution_time' => $total_resolution_time,
                'human_friendly_total_resolution_time' => $total_resolution_time ? CarbonInterval::seconds($total_resolution_time)->cascade()->format('%H:%I:%S') : null,
            ];
        })->filter(fn($team) => $team['points'] !== null && $team['total_resolution_time'] !== null)->sortBy('total_resolution_time')
            ->sortByDesc('points')
            ->mapWithKeys(fn($team, $index) => [$index + 1 => $team]);
    }

    public function deleteAll(): void
    {
        $this->tasks->each(fn($task) => $task->deleteAll());
        $this->teams->each(fn($team) => $team->contests()->detach($this->id));

        $this->delete();
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

}
