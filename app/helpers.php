<?php

use App\Models\ContestDay;
use App\Models\ContestDayTheme;
use Carbon\Carbon;

if (!function_exists('setDay')) {
    function setDay(ContestDay $day): void
    {
        Cache::driver('array')->forever('global.day', $day);
        Cache::driver('array')->forever('global.theme', $day->theme);
    }
}

if (!function_exists('day')) {

    function day(): ContestDay|null
    {
        $day = Cache::driver('array')->rememberForever('global.day', fn () => ContestDay::whereCurrent(true)->first());
        if ($day === null) Cache::driver('array')::set('global.day', false, Carbon::tomorrow());

        return $day === false ? null : $day;
    }
}

if (!function_exists('theme')) {

    function theme(): ContestDayTheme|null
    {
        return day()?->theme;
    }
}

if (!function_exists('waveClass')) {
    function waveClass(int $nummer): string
    {
        return "
        .wave-$nummer {
            background-image: url(" . asset("storage/img/" . (theme()?->images ?? 'backup').  "/wave/light/wave$nummer.svg") . ");
        }

        .dark .wave-$nummer {
            background-image: url(" . asset("storage/img/" . (theme()?->images ?? 'backup') .  "/wave/dark/wave$nummer.svg") . ");
        }
        ";
    }
}
