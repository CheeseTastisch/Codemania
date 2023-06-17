<?php

namespace App\Http\Livewire\Admin\User\Edit;

use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Teams extends Component
{

    use WithSort, WithSearch;

    public User $user;

    public function mount(): void
    {
        $this->sortField = 'name';
        $this->sortDirection = 'asc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.user.edit.teams', [
            'teams' => ($this->search ? Team::search($this->search) : Team::query())
                ->whereHas('users', fn ($query) => $query->where('user_id', $this->user->id))
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(20)
        ]);
    }

}
