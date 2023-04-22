<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class ContestDay extends Model
{

    use Searchable;

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
        'allow_training_from' => 'datetime',
    ];

    public function theme(): HasOne
    {
        return $this->hasOne(ContestDayTheme::class);
    }

    public function sponsors(): HasMany
    {
        return $this->hasMany(ContestDaySponsor::class);
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

    public function deleteAll(): void
    {
        $this->theme->delete();
        $this->sponsors->each(fn($sponsor) => $sponsor->delete());
        $this->contests->each(fn($contest) => $contest->deleteAll());

        $this->delete();
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date->format('d. m. Y'),
        ];
    }

}
