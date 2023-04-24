<?php

namespace App\Http\Livewire\Public\Canvas;

use App\Models\ContestDay;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Sponsors extends Component
{

    public ContestDay $contestDay;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.canvas.sponsors');
    }
}
