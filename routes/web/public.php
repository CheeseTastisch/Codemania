<?php

use App\Http\Controllers\FileController;

Route::view('/', 'site.public.home')->name('home');
Route::view('/imprint', 'site.public.imprint')->name('imprint');
Route::view('/privacy-policy', 'site.public.privacy_policy')->name('privacy_policy');

Route::get('/file/{id}', [FileController::class, 'downloadFile'])->name('file');
