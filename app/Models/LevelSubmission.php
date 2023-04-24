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

        if (!$this->level->instantly_rated && $this->status === 'accepted') {
            if ($this->team->levelSubmissions()
                ->where('level_id', $this->level->id)
                ->where('status', 'accepted')
                ->where('id', '<>', $this->id)
                ->get()
                ->some(fn($levelSubmission) => $levelSubmission->status_changed_at->isAfter($this->status_changed_at)))
                return false;
        }

        if ($this->team->contest->contestDay->training_only) return true;

        $contest = $this->level->task->contest;

        if ($ignoreFreeze || $contest->leaderboard_unfrozen) return true;

        if ($this->status_changed_at->isAfter($contest->freeze_leaderboard_at)) return false;

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

        $this->update([
            'status' => $correct ? 'accepted' : 'rejected',
            'status_changed_at' => now()
        ]);
    }

    public function deleteAll(): void
    {
        StorageFile::deleteFile($this->sourceFile);

        $this->levelFileSubmissions->each(fn($levelFileSubmission) => $levelFileSubmission->deleteAll());

        $this->delete();
    }

}
