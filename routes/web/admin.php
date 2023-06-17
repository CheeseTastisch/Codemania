<?php

use App\Models\Contest;
use App\Models\ContestDay;
use App\Models\Level;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;

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

    Route::get('/team/{team}', fn(Team $team) => setDayAndView(
        $team->contest->contestDay,
        'site.admin.contest.team.edit', compact('team'))
    )->name('admin.contest.team.edit');

    Route::get('/task/{task}', fn(Task $task) => setDayAndView(
        $task->contest->contestDay,
        'site.admin.contest.task.edit', compact('task'))
    )->name('admin.contest.task.edit');

    Route::get('/level/{level}', fn(Level $level) => setDayAndView(
        $level->task->contest->contestDay,
        'site.admin.contest.level.edit', compact('level'))
    )->name('admin.contest.level.edit');
});

Route::prefix('/user')->group(function () {
    Route::view('/', 'site.admin.user.index')->name('admin.user');
    Route::get('/{user}', fn(User $user) => view('site.admin.user.edit', compact('user')))->name('admin.user.edit');
});

Route::view('/memes', 'site.admin.memes')->name('admin.memes');
