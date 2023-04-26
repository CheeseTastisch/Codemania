<?php

use App\Models\Contest;
use App\Models\ContestDay;
use App\Models\Level;
use App\Models\Task;

Route::view('/', 'site.admin.dashboard')->name('admin.dashboard');
Route::view('/faq', 'site.admin.faq')->name('admin.faq');

Route::prefix('contest/')->group(function () {
    Route::view('/', 'site.admin.contest.contest-day.view')->name('admin.contest.contest-day.view');


    Route::get('/contestDay/{contestDay}', fn(ContestDay $contestDay) => setDayAndView(
        $contestDay,
        'site.admin.contest.contest-day.edit', compact('contestDay'))
    )->name('admin.contest.contest-day.edit');

    Route::get('/contest/{contest}', fn(Contest $contest) => setDayAndView(
        $contest->contestDay,
        'site.admin.contest.contest.edit', compact('contest'))
    )->name('admin.contest.contest.edit');

    Route::get('/leaderboard/{contest}', fn(Contest $contest) => setDayAndView(
        $contest->contestDay,
        'site.admin.contest.contest.leaderboard', compact('contest'))
    )->name('admin.contest.contest.leaderboard');

    Route::get('/task/{task}', fn(Task $task) => setDayAndView(
        $task->contest->contestDay,
        'site.admin.contest.task.edit', compact('task'))
    )->name('admin.contest.task.edit');

    Route::get('/level/{level}', fn(Level $level) => setDayAndView(
        $level->task->contest->contestDay,
        'site.admin.contest.level.edit', compact('level'))
    )->name('admin.contest.level.edit');
});
