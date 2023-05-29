<?php

namespace App\Http\Livewire\Member\Contest\Training;

use App\Models\Contest;
use App\Models\Task;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Container extends Component
{

    public Contest $contest;
    public Team $team;

    public ?int $selectedTask;
    public ?int $selectedLevel;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        $this->team = auth()->user()->getTeamForContest($this->contest, true);

        $this->selectedTask = $this->contest->tasks->sortBy('order')->first()?->id;
        $this->selectedLevel = Task::whereId($this->selectedTask)->first()?->levels?->sortBy('level')?->first()?->id;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.training.container');
    }

    public function updatedSelectedTask(): void
    {
        $this->selectedLevel = Task::whereId($this->selectedTask)
            ->first()
            ?->levels
            ?->sortBy('level')
            ?->first()
            ?->id;
    }

}
