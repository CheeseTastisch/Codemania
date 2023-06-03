<?php

use App\Http\Controllers\member\AuthController;

Route::get('/logout', [AuthController::class, 'logout'])->name('member.auth.logout');

Route::view('/profile', 'site.member.profile')->name('member.profile');

Route::view('/2fa', 'site.member.auth.two_factor')->middleware('2fa.enabled', '2fa.not_verified')->name('member.auth.2fa');
Route::view('/2fa/recovery', 'site.member.auth.two_factor_recovery')->middleware('2fa.enabled')->name('member.auth.2fa.recovery');

Route::middleware('not_verified')->group(function () {
    Route::view('/verification/notice', 'site.member.verification.notice')->name('verification.notice');
    Route::get('/verification/resend', [AuthController::class, 'resendVerificationEmail'])->name('verification.send');
    Route::get('/verification/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
});
