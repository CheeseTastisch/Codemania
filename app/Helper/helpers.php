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
        if ($day === null) Cache::driver('array')->set('global.day', false, Carbon::tomorrow());

        return $day === false ? null : $day;
    }
}

if (!function_exists('theme')) {

    function theme(): ContestDayTheme|null
    {
        return day()?->theme;
    }
}

if (!function_exists('waves')) {
    function waves(array $number): string
    {
        return collect($number)
            ->map(fn ($number) => wave($number))
            ->implode('');
    }
}


if (!function_exists('wave')) {
    function wave(int $number): string
    {
        return ".wave-$number {background-image: url(" . asset("storage/backup/wave/light/wave$number.svg") . ");}.dark .wave-$number {background-image: url(" . asset("storage/backup/wave/dark/wave$number.svg") . ");}";
    }
}

if (!function_exists('themeWaves')) {
    function themeWaves(): string
    {
        return theme()?->waves([1, 2, 3, 4]) ?? waves([1, 2, 3, 4]);
    }
}

if (!function_exists('is_assoc')) {
    function is_assoc(array $array): bool
    {
        if ([] === $array) return false;
        return array_keys($array) !== range(0, count($array) - 1);
    }
}
