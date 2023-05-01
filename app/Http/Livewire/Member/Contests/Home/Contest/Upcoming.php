<?php

namespace App\Http\Livewire\Member\Contests\Home\Contest;

use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Upcoming extends Component
{

    public Contest $contest;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contests.home.contest.upcoming');
    }
}
