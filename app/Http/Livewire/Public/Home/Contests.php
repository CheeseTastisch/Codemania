<?php

namespace App\Http\Livewire\Public\Home;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest;
use App\Models\ContestDay;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Contests extends Component
{

    use LoadsDataLater;

    public $contests;

    public int $count = 0;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.home.contests');
    }

    protected function dataLoaded(): void
    {
        $this->contests = ContestDay::where('allow_training_from', '<', now())
            ->orderByDesc('date')
            ->with('contests')
            ->get()
            ->flatMap(fn ($contestDay) => $contestDay->contests);

        $this->count = $this->contests->count();
    }

}
