<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Leaderboard;

use App\Concerns\Livewire\LoadsDataLater;
use App\Concerns\Livewire\WithPaginatedCollection;
use App\Models\Contest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Leaderboard extends Component
{

    use WithPaginatedCollection, LoadsDataLater;

    public Contest $contest;

    public $ignore_freeze = false;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest.leaderboard.leaderboard', [
            'leaderboard' => $this->loadData ? $this->paginateCollection($this->contest->getLeaderboard($this->ignore_freeze), 10) : null,
        ]);
    }

}
