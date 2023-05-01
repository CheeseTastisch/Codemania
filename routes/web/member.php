<?php

Route::view('/profile', 'site.member.profile')->name('member.profile');

Route::view('/contests', 'site.member.contest.home')->name('member.contests.home');

Route::get('/join/{contest}', fn(\App\Models\Contest $contest) => setDayAndView(
    $contest->contestDay,
    'site.member.contest.join', compact('contest'))
)->name('member.contest.join');
