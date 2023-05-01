<?php

namespace App\Http\Livewire\Member\Contest\Home\Contest;

use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Running extends Component
{

    public Contest $contest;

    public $hours, $minutes, $seconds;

    public $place, $points;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $diff = $this->contest->end_time->diff(now());

        $this->hours = $diff->h;
        $this->minutes = $diff->i;
        $this->seconds = $diff->s;

        $team = auth()->user()->getTeamForContest($this->contest);

        if ($team != null) {
            $this->place = $team->getPlace();
            $this->points = $team->getPoints();
        }

        return view('livewire.member.contest.home.contest.running');
    }
}
