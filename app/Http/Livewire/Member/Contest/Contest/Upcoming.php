<?php

namespace App\Http\Livewire\Member\Contest\Contest;

use App\Models\Contest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class Upcoming extends Component
{

    public Contest $contest;

    public int $days, $hours, $minutes, $seconds;

    public function mount(): void
    {
        $diff = $this->contest->start_time->diff(now());

        $this->days = $diff->d;
        $this->hours = $diff->h;
        $this->minutes = $diff->i;
        $this->seconds = $diff->s;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.upcoming');
    }


}
