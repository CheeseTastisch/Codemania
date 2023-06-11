<?php

namespace App\Http\Livewire\Member\Contest\Contest\Running;

use App\Models\Level;
use App\Models\LevelSubmission;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Accepted extends Component
{

    public Level $level;
    public ?LevelSubmission $levelSubmission;
    public Team $team;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.running.accepted');
    }
}
