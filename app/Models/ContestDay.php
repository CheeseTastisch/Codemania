<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContestDay extends Model
{

    protected $fillable = [
        'date',
        'fifty',
        'hundred',
        'two_hundred',
        'three_hundred',
        'four_hundred',
        'five_hundred',
        'six_hundred',
        'seven_hundred',
        'eight_hundred',
        'nine_hundred',
        'images'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    function contests(): HasMany
    {
        return $this->hasMany(Contest::class);
    }

}
