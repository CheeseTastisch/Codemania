<?php

namespace App\Http\Livewire\Member\Contests\Home;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest;
use App\Models\ContestDay;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Container extends Component
{

    use LoadsDataLater;

    /**
     * @var Collection<Contest> $running
     * @var Collection<Contest> $upcoming
     * @var Collection<Contest> $forRegistration
     * @var Collection<Contest> $past
     */
    public Collection $running, $upcoming, $forRegistration, $past;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        if ($this->loadData) {
            $contests = auth()->user()->contests;

            $this->running = $contests
                ->where('start_time', '<=', now())
                ->where('end_time', '>=', now());

            $this->upcoming = $contests
                ->where('start_time', '>', now());

            $this->forRegistration = ContestDay::where('registration_deadline', '>', now())
                ->with('contests')
                ->get()
                ->flatMap(fn(ContestDay $contestDay) => $contestDay->contests)
                ->where('start_time', '>', now())
                ->where(fn (Contest $contest) => $contests->where('id', $contest->id)->isEmpty());

            $this->past = $contests
                ->where('end_time', '<', now());

        }

        return view('livewire.member.contests.home.container');
    }

}
