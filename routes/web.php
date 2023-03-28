<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\member\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'site.public.home')->name('public.home');
Route::view('/imprint', 'site.public.imprint')->name('public.imprint');
Route::view('/privacy-policy', 'site.public.privacy_policy')->name('public.privacy_policy');

Route::get('/file/{id}', [FileController::class, 'downloadFile'])->name('file.download');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'site.member.auth.login')->name('member.auth.login');
    Route::view('/register', 'site.member.auth.register')->name('member.auth.register');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'site.public.home')->name('member.dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('member.auth.logout');

    Route::view('/2fa', 'site.member.auth.two_factor')->middleware('2fa_enabled', 'not_2fa')->name('member.auth.2fa');

    Route::middleware('not_verified')->group(function () {
        Route::view('/verification/notice', 'site.member.verification.notice')->name('verification.notice');
        Route::get('/verification/resend', [AuthController::class, 'resendVerificationEmail'])->name('verification.send');
        Route::get('/verification/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
    });

    Route::middleware(['2fa', 'verified'])->group(function () {
        Route::view('/profile', 'site.member.profile')->name('member.profile');
    });
});
