<?php

use App\Models\Contest;

Route::view('/profile', 'site.member.profile')->name('member.profile');

Route::view('/contests', 'site.member.contest.home')->name('member.contest.home');

Route::get('/join/{contest}', fn(Contest $contest) => setDayAndView(
    $contest->contestDay,
    'site.member.contest.join', compact('contest'))
)->name('member.contest.join');

Route::get('/join/{contest}/team/create', fn(Contest $contest) => setDayAndView(
    $contest->contestDay,
    'site.member.contest.team.create', compact('contest'))
)->name('member.contest.team.create');
