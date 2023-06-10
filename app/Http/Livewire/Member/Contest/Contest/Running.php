<?php

namespace App\Http\Livewire\Member\Contest\Contest;

use App\Models\Contest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Running extends Component
{

    public Contest $contest;
    public Team $team;

    public int $hours, $minutes, $seconds;

    public function mount(): void
    {
        $diff = $this->contest->end_time->diff(now());

        $this->hours = $diff->h;
        $this->minutes = $diff->i;
        $this->seconds = $diff->s;

        $this->team = auth()->user()->getTeamForContest($this->contest);
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.running');
    }
}
