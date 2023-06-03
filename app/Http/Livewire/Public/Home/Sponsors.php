<?php

namespace App\Http\Livewire\Public\Home;

use App\Concerns\Livewire\LoadsDataLater;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Sponsors extends Component
{

    public int $count = 0;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->count = day()?->sponsors()->count() ?? 0;

        return view('livewire.public.home.sponsors');
    }

}
