<?php

namespace App\Http\Livewire\Member\Contest\Contest;

use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Training extends Component
{

    public Contest $contest;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.training');
    }
}
