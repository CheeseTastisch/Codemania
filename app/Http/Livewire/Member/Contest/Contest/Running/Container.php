<?php

namespace App\Http\Livewire\Member\Contest\Contest\Running;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Container extends Component
{

    use LoadsDataLater;

    public Contest $contest;
    public Team $team;

    public ?int $selectedTask;
    public ?int $selectedLevel;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.running.container');
    }

    protected function dataLoaded(): void
    {
        $this->selectedTask = $this->contest->tasks->sortBy('order')->first()?->id;
        $this->selectedLevel = $this->contest->tasks->sortBy('order')->first()?->levels->sortBy('level')->first()?->id;
    }


}
