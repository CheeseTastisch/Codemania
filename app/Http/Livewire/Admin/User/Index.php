<?php

namespace App\Http\Livewire\Admin\User;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithPaginatedCollection;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination, WithSort, WithSearch, WithPaginatedCollection;

    public function mount(): void
    {
        $this->sortField = 'display_name';
        $this->sortDirection = 'asc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.user.index', [
            'users' => $this->paginateCollection(($this->search ? User::search($this->search) : User::query())
                ->get()
                ->sortBy($this->sortField, SORT_REGULAR, $this->sortDirection == 'desc'),
                20)
        ]);
    }

}
