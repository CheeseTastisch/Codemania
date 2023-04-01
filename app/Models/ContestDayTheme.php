<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ContestDayTheme extends Model
{

    protected $fillable = [
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
        'nine_hundred_fifty',
        'images'
    ];

    public function contestDay(): HasOne
    {
        return $this->hasOne(ContestDay::class);
    }

}
