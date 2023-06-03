<?php

use App\Http\Controllers\member\ContestController;
use App\Models\Contest;
use App\Models\Team;

Route::view('/contests', 'site.member.contest.home')->name('member.contest.home');

Route::get('/contest/{contest}', [ContestController::class, 'view'])->name('member.contest.contest');
Route::get('/join/{team}', [ContestController::class, 'join'])->name('member.contest.join');

Route::get('/training/{contest}', fn (Contest $contest) => setDayAndView(
    $contest->contestDay,
    'site.member.contest.training', compact('contest')
))->name('member.contest.training');
