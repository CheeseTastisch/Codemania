<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function isShouldBeRatedAttribute(): bool
    {
        if ($this->status === 'pending' || $this->status === 'checking') return false;

        $level = $this->level;
        $contest = $level->task->contest;
        $contestDay = $contest->contestDay;

        if ($contestDay->allow_training_from !== null && $this->status_changed_at->isAfter($contestDay->allow_training_from))
            return false;

        if ($contest->freeze_leaderboard_at !== null
            && $contest->leaderboard_unfrozen === false
            && $this->status_changed_at->isAfter($contest->freeze_leaderboard_at)) return false;

        return $level->instantly_rated === true || $contest->end_time->isPast();
    }

}
