<?php

use App\Http\Controllers\FileController;
use App\Models\ContestDay;

Route::view('/', 'site.public.home')->name('public.home');
Route::view('/imprint', 'site.public.imprint')->name('public.imprint');
Route::view('/privacy-policy', 'site.public.privacy_policy')->name('public.privacy_policy');
Route::view('/rules', 'site.public.rules')->name('public.rules');
Route::get('/canvas/{contestDay}', fn(ContestDay $contestDay) => setDayAndView(
    $contestDay,
    'site.public.canvas', compact('contestDay')
));
Route::view('/discord', 'site.public.discord')->name('public.discord');

Route::get('/file/{id}', [FileController::class, 'downloadFile'])->name('public.file');
