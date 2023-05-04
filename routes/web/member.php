<?php

use App\Models\Contest;

Route::view('/profile', 'site.member.profile')->name('member.profile');

Route::view('/contests', 'site.member.contest.home')->name('member.contest.home');

