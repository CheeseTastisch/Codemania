<?php

namespace App\Http\Livewire\Member\Contest\Training;

use App\Models\Level;
use App\Models\LevelSubmission;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Accepted extends Component
{

    use WithFileUploads;


    public Level $level;
    public ?LevelSubmission $levelSubmission;
    public Team $team;

    public $file;

    public $sourceFile;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.training.accepted');
    }
}
