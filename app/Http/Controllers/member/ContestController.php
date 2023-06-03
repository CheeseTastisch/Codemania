<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\Team;
use Carbon\Carbon;

class ContestController extends Controller
{

    public function view(Contest $contest) {
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
    }

    public function join(Team $team) {
        $pivot = $team->users->where('id', '=', auth()->user()->id)->first()?->pivot;

        if (!auth()->user()->contests->contains($team->contest)) auth()->user()->contests()->attach($team->contest);

        if ($pivot?->role != 'invited') {
            return redirect()->route('member.contest.home')->with('toast', [
                'text' => 'Du wurdest nicht in diese Team eingeladen.',
                'type' => 'danger',
            ]);
        }

        if (Carbon::parse($pivot->invited_at)->addDay()->isPast()) {
            return redirect()->route('member.contest.home')->with('toast', [
                'text' => 'Die Einladung ist abgelaufen.',
                'type' => 'danger',
            ]);
        }

        $team->users()->updateExistingPivot(auth()->user(), ['role' => 'member', 'invited_at' => null]);

        return redirect()->route('member.contest.contest', $team->contest)->with('toast', [
            'text' => 'Du bist dem Team beigetreten.',
            'type' => 'success',
        ]);
    }

}
