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

if (!function_exists('setTheme')) {
    function setTheme(ContestDay|ContestDayTheme $day): void
    {
        if ($day instanceof ContestDay) $day = $day->theme;
        Cache::driver('array')->forever('global.theme', $day);
    }
}

if (!function_exists('day')) {

    function day(): ContestDay|null
    {
        if (Cache::driver('array')->has('global.day')) return Cache::driver('array')->get('global.day');

        $day = Cache::driver('file')->remember('global.day', Carbon::tomorrow(), fn () => ContestDay::whereCurrent(true)->first());
        if ($day === null) Cache::set('global.day', false, Carbon::tomorrow());

        return $day === false ? null : $day;
    }
}

if (!function_exists('theme')) {

    function theme(): ContestDayTheme|null
    {
        if (Cache::driver('array')->has('global.theme')) return Cache::driver('array')->get('global.theme');

        $theme = Cache::driver('file')->remember('global.theme', Carbon::tomorrow(), fn () => day()?->theme);
        if ($theme === null) Cache::set('global.theme', false, Carbon::tomorrow());

        return $theme === false ? null : $theme;
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
