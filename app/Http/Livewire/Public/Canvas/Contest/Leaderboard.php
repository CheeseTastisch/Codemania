<?php

namespace App\Http\Livewire\Public\Canvas\Contest;

use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Leaderboard extends Component
{

    public Contest $target;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.public.canvas.contest.leaderboard', [
            'leaderboard' => $this->target->getLeaderboard()->take(10),
        ]);
    }
}
