<?php

namespace App\Http\Livewire\Public\Canvas\Contest;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class TimeTillEnd extends Component
{

    public Collection $target;

    public $hours, $minutes, $seconds, $names;

    public function mount(): void
    {
        $diff = $this->target->first()->end_time->diff();

        $this->hours = $diff->h;
        $this->minutes = $diff->i;
        $this->seconds = $diff->s;

        $this->names = $this->target->map(fn ($contest) => $contest->name)->naturalImplode();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.canvas.contest.time-till-end');
    }
}
