<?php

Route::view('/login', 'site.member.auth.login')->name('member.auth.login');
Route::view('/register', 'site.member.auth.register')->name('member.auth.register');

Route::view('/password/reset', 'site.member.auth.password.request')->name('member.auth.password.request');
Route::view('/password/reset/{id}/{token}', 'site.member.auth.password.reset')->name('member.auth.password.reset');
