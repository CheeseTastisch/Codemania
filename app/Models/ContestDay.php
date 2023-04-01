<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContestDay extends Model
{

    protected $fillable = [
        'date',
        'registration_deadline',
        'name',
        'allow_training_from',
        'current',
        'contest_day_theme_id'
    ];

    protected $casts = [
        'date' => 'date',
        'registration_deadline' => 'date',
        'allow_training_from' => 'timestamp',
    ];

    public function theme(): BelongsTo
    {
        return $this->belongsTo(ContestDayTheme::class, 'id');
    }

    public function contests(): HasMany
    {
        return $this->hasMany(Contest::class);
    }

    public function getRegistrationDeadline()
    {
        if ($this->registration_deadline) return $this->registration_deadline;
        return $this->date;
    }

}
