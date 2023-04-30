<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;

class Team extends Model
{

    use Searchable;

    protected $fillable = [
        'contest_id',
        'name',
        'logo_file_id',
        'is_blocked',
        'block_reason',
        'blocked_by',
    ];

    public static function fromRandom(Contest $contest, Collection $users, int $number): self
    {
        $admin = $users->random();
        $members = $users->filter(fn($user) => $user->id !== $admin->id);

        $name = 'Glücksteam ' . $number;
        if ($contest->teams()->whereName($name)->exists()) {
            $number *= 10;
            $name = 'Glücksteam ' . $number;
        }

        $team = static::create([
            'contest_id' => $contest->id,
            'name' =>  $name,
        ]);

        $team->users()->attach($admin, ['role' => 'admin']);
        if ($members->count() > 0) $team->users()->attach($members, ['role' => 'member']);

        // TODO: Send email to admin and members
        // Or inform them that they are playing solo

        return $team;
    }

    public function contest(): BelongsTo
    {
        return $this->belongsTo(Contest::class);
    }

    public function logoFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class);
    }

    public function blockedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'blocked_by');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

    public function levelSubmissions(): HasMany
    {
        return $this->hasMany(LevelSubmission::class);
    }

    public function getPoints(bool $ignoreFreeze = false, Contest|null $contest = null): int|null
    {
        if ($this->is_blocked) return null;

        return $this->levelSubmissions
            ->filter(fn($levelSubmission) => $levelSubmission->shouldBeRated($ignoreFreeze) && $levelSubmission->status === 'accepted')
            ->unless($contest === null, fn($levelSubmission) => $levelSubmission
                ->filter(fn($levelSubmission) => $levelSubmission->level->task->contest_id === $contest->id))
            ->map(fn($levelSubmission) => $levelSubmission->level->points)
            ->sum();
    }


    public function getTotalResolutionTime(bool $ignoreFreeze = false, Contest|null $contest = null): int|null
    {
        if ($this->is_blocked) return null;

        return $this->levelSubmissions
            ->filter(fn($levelSubmission) => $levelSubmission->shouldBeRated($ignoreFreeze))
            ->unless($contest === null, fn($levelSubmission) => $levelSubmission
                ->filter(fn($levelSubmission) => $levelSubmission->level->task->contest_id === $contest->id))
            ->map(fn($levelSubmission) => $levelSubmission->status === 'accepted'
                ? $levelSubmission->status_changed_at->diffInSeconds($this->contest->start_time)
                : $this->contest->wrong_solution_penalty * 60)
            ->sum();
    }

    public function getPlace(bool $ignoreFreeze = false, Contest|null $contest = null): int|null
    {
        return ($contest ?? $this->contest)
            ->getLeaderboard($ignoreFreeze)
            ->where('team_id', $this->id)
            ->first()
            ?->get('place');
    }

    public function getTaskLevelHeaders(Contest|null $contest = null): Collection {
        return ($contest ?? $this->contest)->tasks
            ->map(fn (Task $task) => [
                'task' => $task,
                'levels' => $task->levels
            ])
            ->map(fn (array $task) => collect([
                'name' => $task['task']->name,
                'levels' => $task['levels']
                    ->map(fn (Level $level) => collect([
                        'level' => $level->level,
                        'state' => $this->getLevelState($level)
                    ])->sortBy('level'))
            ]));
    }

    private function getLevelState(Level $level): LevelState
    {
        $levelSubmission = $this->levelSubmissions()->whereLevelId($level->id)->first();

        if ($levelSubmission === null) {
            $previousLevel = $level->task->levels()->where('level', '<', $level->level)->orderBy('level', 'desc')->first();

            if ($previousLevel === null) return LevelState::UNLOCKED;

            $previousLevelSubmission = $this->levelSubmissions()->whereLevelId($previousLevel->id)->first();
            if ($previousLevelSubmission === null) return LevelState::LOCKED;

            if ($previousLevelSubmission->status === 'accepted') return LevelState::UNLOCKED;
            if (!$previousLevel->instantly_rated && !$previousLevel->task->contest->leaderboard_unfrozen) return LevelState::UNLOCKED;

            return LevelState::LOCKED;
        }

        if ($levelSubmission->status === 'accepted') {
            if ($level->instantly_rated || $level->task->contest->leaderboard_unfrozen) return LevelState::ACCEPTED;
            return LevelState::SECRETLY_ACCEPTED;
        }

        if ($levelSubmission->status === 'rejected') {
            if ($level->instantly_rated || $level->task->contest->leaderboard_unfrozen) return LevelState::REJECTED;
            return LevelState::SECRETLY_REJECTED;
        }

        return LevelState::UNLOCKED;
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

}
