<?php

namespace App\Http\Livewire\Member\Contest\Training;

use App\Models\Level;
use App\Models\LevelSubmission;
use App\Models\Team;
use Livewire\Component;

class Rejected extends Component
{

    public Level $level;
    public ?LevelSubmission $levelSubmission;
    public Team $team;
    public function render()
    {
        return view('livewire.member.contest.training.rejected');
    }
}
