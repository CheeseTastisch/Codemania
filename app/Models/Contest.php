<?php

namespace App\Models;

use Cache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contest extends Model
{

    protected $fillable = [
        'name',
        'contest_day_id',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time' => 'timestamp',
        'end_time' => 'timestamp',
        'freeze_leaderboard_at' => 'timestamp',
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

}
