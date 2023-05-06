<?php

use App\Models\Contest;

Route::view('/profile', 'site.member.profile')->name('member.profile');

Route::view('/contests', 'site.member.contest.home')->name('member.contest.home');

Route::get('/contest/{contest}', fn (Contest $contest) => setDayAndView(
    $contest->contestDay,
    'site.member.contest.contest', compact('contest')
))->name('member.contest.contest');
