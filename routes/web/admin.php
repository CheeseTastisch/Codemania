<?php

Route::view('/', 'site.admin.dashboard')->name('admin.dashboard');
Route::view('/faq', 'site.admin.faq')->name('admin.faq');

Route::prefix('contest/')->group(function () {
    Route::view('/', 'site.admin.contest.home')->name('admin.contest.home');
});
