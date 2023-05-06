<?php

namespace App\Http\Livewire\Member\Contest\Contest;

use App\Models\Contest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Upcoming extends Component
{

    public Contest $contest;

    public Team $team;

    public function mount(): void
    {
        $this->team = auth()->user()->getTeamForContest($this->contest);
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.upcoming');
    }
}
