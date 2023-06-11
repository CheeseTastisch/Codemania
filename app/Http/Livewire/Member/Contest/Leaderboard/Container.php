<?php

namespace App\Http\Livewire\Member\Contest\Leaderboard;

use App\Concerns\Livewire\LoadsDataLater;
use App\Concerns\Livewire\WithPaginatedCollection;
use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Container extends Component
{

    use WithPaginatedCollection, LoadsDataLater;

    public Contest $contest;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.leaderboard.container', [
            'leaderboard' => $this->loadData ? $this->paginateCollection($this->contest->getLeaderboard(), 20) : null,
        ]);
    }

}
