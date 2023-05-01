<?php

namespace App\Http\Livewire\Member\Contest\Home\Contest;

use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Past extends Component
{

    public Contest $contest;

    public $place, $points;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $team = auth()->user()->getTeamForContest($this->contest);

        if ($team != null) {
            $this->place = $team->getPlace();
            $this->points = $team->getPoints();
        }

        return view('livewire.member.contest.home.contest.past');
    }
}
