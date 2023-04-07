<?php

namespace App\Http\Livewire\Public\Home;

use App\Concerns\Livewire\LoadsDataLater;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Faq extends Component
{

    use LoadsDataLater;
    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.home.faq');
    }

    public function dataLoaded(): void
    {
        $this->emit('accordion', 'create', 'faq-accordion');
    }

}
