<?php

use App\Models\Contest;

Route::view('/profile', 'site.member.profile')->name('member.profile');

Route::view('/contests', 'site.member.contest.home')->name('member.contest.home');

Route::get('/contest/{contest}', function (Contest $contest) {
    if (!auth()->user()->contests->contains($contest)) {
        return redirect()->route('member.contest.home')->with('toast', [
            'text' => 'Du must dem Wettbewerb beitreten, um ihn zu sehen.',
            'type' => 'danger',
        ]);
    }

    return setDayAndView(
        $contest->contestDay,
        'site.member.contest.contest', compact('contest')
    );
})->name('member.contest.contest');

Route::get('/training/{contest}', fn (Contest $contest) => setDayAndView(
    $contest->contestDay,
    'site.member.contest.training', compact('contest')
))->name('member.contest.training');
