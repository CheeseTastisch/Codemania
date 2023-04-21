<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Edit;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest as ContestModel;
use Illuminate\Support\Collection;
use Livewire\Component;

class Leaderboard extends Component
{

    use LoadsDataLater;

    public ContestModel $contest;

    public $ignore_freeze = false;

    public Collection $leaderboard;

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        if ($this->loadData) $this->updateLeaderboard();

        return view('livewire.admin.contest.contest.edit.leaderboard');
    }

    public function updatedIgnoreFreeze(): void
    {
        session()->flash('updated', 'ignore_freeze');
    }

    private function updateLeaderboard(): void
    {
        $this->leaderboard = $this->contest->getLeaderboard($this->ignore_freeze)->take(5);
    }

}
