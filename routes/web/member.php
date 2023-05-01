<?php

Route::view('/profile', 'site.member.profile')->name('member.profile');

Route::view('/contests', 'site.member.contests.home')->name('member.contests.home');
