<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Edit;

use App\Concerns\Livewire\WithPaginatedCollection;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Contest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination, WithSort, WithSearch, WithPaginatedCollection;

    public Contest $contest;

    public function mount(): void
    {
        $this->sortField = 'display_name';
        $this->sortDirection = 'asc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest.edit.users', [
            'users' => $this->paginateCollection(($this->search ? User::search($this->search) : User::query())
                ->whereHas('contests', fn ($query) => $query->where('contest_id', $this->contest->id))
                ->get()
                ->sortBy($this->sortField, SORT_REGULAR, $this->sortDirection == 'desc'),
                20, 'user')
        ]);
    }
}
