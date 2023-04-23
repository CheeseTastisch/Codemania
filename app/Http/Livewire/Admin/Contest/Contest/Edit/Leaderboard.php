<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Edit;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest as ContestModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Leaderboard extends Component
{

    use LoadsDataLater;

    public ContestModel $contest;

    public $ignore_freeze = false;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest.edit.leaderboard', [
            'leaderboard' => $this->loadData ? $this->contest->getLeaderboard($this->ignore_freeze)->take(5) : null
        ]);
    }

    public function updatedIgnoreFreeze(): void
    {
        session()->flash('updated', 'ignore_freeze');
    }

}
