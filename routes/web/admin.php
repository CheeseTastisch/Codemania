<?php

use App\Models\ContestDay;

Route::view('/', 'site.admin.dashboard')->name('admin.dashboard');
Route::view('/faq', 'site.admin.faq')->name('admin.faq');

Route::prefix('contest/')->group(function () {
    Route::view('/', 'site.admin.contest.contest-day.view')->name('admin.contest.contest-day.view');

    Route::get('/{contestDay}', fn(ContestDay $contestDay) => setDayAndView($contestDay, 'site.admin.contest.contest-day.edit', compact('contestDay')))
        ->name('admin.contest.contest-day.edit');
});
