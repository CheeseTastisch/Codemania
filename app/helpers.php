<?php

use App\Models\ContestDay;
use Carbon\Carbon;

if (!function_exists('setDay')) {
    function setDay(ContestDay $day): void
    {
        Cache::driver('array')->forever('day', $day);
    }
}

if (!function_exists('day')) {
    function day(): ContestDay
    {
        return Cache::driver('array')
            ->rememberForever('day', fn() => ContestDay::whereDate('date', '>=', Carbon::today())
                ->orderBy('date')
                ->firstOr(fn() => ContestDay::orderByDesc('date')->firstOrFail()));
    }
}

if (!function_exists('waveClass')) {
    function waveClass(int $nummer): string
    {
        return "
        .wave-$nummer {
            background-image: url(" . asset("storage/img/" . day()->images .  "/wave/light/wave$nummer.svg") . ");
        }

        .dark .wave-$nummer {
            background-image: url(" . asset("storage/img/" . day()->images .  "/wave/dark/wave$nummer.svg") . ");
        }
        ";
    }
}
