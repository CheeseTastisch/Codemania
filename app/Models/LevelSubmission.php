<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use StorageFile;

class LevelSubmission extends Model
{

    protected $fillable = [
        'team_id',
        'level_id',
        'status',
        'status_changed_at',
        'source_file_id',
        'image_file_id'
    ];

    protected $casts = [
        'status_changed_at' => 'datetime'
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function sourceFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'source_file_id');
    }

    public function imageFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'image_file_id');
    }

    public function levelFileSubmissions(): HasMany
    {
        return $this->hasMany(LevelFileSubmission::class);
    }

    public function shouldBeRated(bool $ignoreFreeze = false): bool
    {
        if ($this->status === 'pending' || $this->status === 'checking') return false;

        $contest = $this->level->task->contest;

        if ($ignoreFreeze) return true;
        if ($contest->freeze_leaderboard_at === null) return true;
        if ($contest->leaderboard_unfrozen === true) return true;
        if ($this->status_changed_at->isBefore($contest->freeze_leaderboard_at)) return true;
        if ($this->level->instantly_rated) return true;

        return false;
    }

    public function evaluateStatus(): void
    {
        $correct = true;

        collect($this->level->levelFiles)->each(function ($levelFile) use (&$correct) {
            $levelFileSubmission = $this->levelFileSubmissions->firstWhere('level_file_id', $levelFile->id);
            $levelFileSubmission?->evaluateStatus();
            if ($levelFileSubmission === null || $levelFileSubmission->status !== 'accepted') $correct = false;
        });

        $this->status = $correct ? 'accepted' : 'rejected';
    }

    public function deleteAll(): void
    {
        StorageFile::deleteFile($this->sourceFile);

        $this->levelFileSubmissions->each(fn($levelFileSubmission) => $levelFileSubmission->deleteAll());

        $this->delete();
    }

}
