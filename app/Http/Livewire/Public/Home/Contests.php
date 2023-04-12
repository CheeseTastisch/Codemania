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


        $this->emit('loadSwiper', '#contests-swiper', [
            'breakpoints' => [
                640 => [
                    'slidesPerView' => min(1, $this->contests->count()),
                ],
                1024 => [
                    'slidesPerView' => min(2, $this->contests->count()),
                ],
                1280 => [
                    'slidesPerView' => min(3, $this->contests->count()),
                ],
                1536 => [
                    'slidesPerView' => min(4, $this->contests->count()),
                ],
            ]
        ]);
    }

}
