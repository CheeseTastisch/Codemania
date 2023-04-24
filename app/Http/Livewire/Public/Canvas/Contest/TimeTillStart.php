<?php

namespace App\Http\Livewire\Public\Canvas\Contest;

use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TimeTillStart extends Component
{

    public Contest $contest;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.canvas.contest.time-till-start');
    }

    public function getTime(): string
    {
        return $this->contest->start_time->diffForHumans();
    }

}
