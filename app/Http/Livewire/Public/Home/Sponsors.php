<?php

namespace App\Http\Livewire\Public\Home;

use App\Concerns\Livewire\LoadsDataLater;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Sponsors extends Component
{

    use LoadsDataLater;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.home.sponsors');
    }

    public function dataLoaded(): void
    {
        $max = day()?->sponsors()->count() ?? 0;

        $this->emit('loadSwiper', '#sponsors-swiper', [
            'loop' => true,
            'grabCursor' => true,
            'autoplay' => [],
            'breakpoints' => [
                640 => [
                    'slidesPerView' => min($max, 2),
                ],
                768 => [
                    'slidesPerView' => min($max, 3)
                ],
                1024 => [
                    'slidesPerView' => min($max, 4)
                ],
                1280 => [
                    'slidesPerView' => min($max, 5)
                ],
                1536 => [
                    'slidesPerView' => min($max, 6)
                ],
            ]
        ]);
    }

}
