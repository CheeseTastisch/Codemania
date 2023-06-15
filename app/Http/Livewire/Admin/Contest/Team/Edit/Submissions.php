<?php

namespace App\Http\Livewire\Admin\Contest\Team\Edit;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Submissions extends Component
{

    use LoadsDataLater;

    public Team $team;
    public Contest $contest;

    public int $selectedTask;
    public int $selectedLevel;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.team.edit.submissions');
    }

    protected function dataLoaded(): void
    {
        $this->contest = $this->team->contest;

        $this->selectedTask = $this->contest->tasks->sortBy('order')->first()?->id;
        $this->selectedLevel = $this->contest->tasks->sortBy('order')->first()?->levels->sortBy('level')->first()?->id;
    }

}
