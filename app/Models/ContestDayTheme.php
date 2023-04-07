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

    public function getVariablesAttribute(): string
    {
        return "
            --color-accent-50: $this->fifty;
            --color-accent-100: $this->hundred;
            --color-accent-200: $this->two_hundred;
            --color-accent-300: $this->three_hundred;
            --color-accent-400: $this->four_hundred;
            --color-accent-500: $this->five_hundred;
            --color-accent-600: $this->six_hundred;
            --color-accent-700: $this->seven_hundred;
            --color-accent-800: $this->eight_hundred;
            --color-accent-900: $this->nine_hundred;
            --color-accent-950: $this->nine_hundred_fifty;
        ";
    }

}
