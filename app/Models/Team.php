<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

}
