<?php

use App\Http\Controllers\FileController;

Route::view('/', 'site.public.home')->name('public.home');
Route::view('/imprint', 'site.public.imprint')->name('public.imprint');
Route::view('/privacy-policy', 'site.public.privacy_policy')->name('public.privacy_policy');

Route::get('/file/{id}', [FileController::class, 'downloadFile'])->name('public.file');
