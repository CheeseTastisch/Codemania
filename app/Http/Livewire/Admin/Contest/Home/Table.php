<?php

namespace App\Http\Livewire\Admin\Contest\Home;

use App\Concerns\Livewire\WithSort;
use App\Concerns\Livewire\LoadsDataLater;
use App\Models\ContestDay;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination, WithSort;

    public ContestDay|null $deleteTarget = null;

    public function mount(): void
    {
        $this->sortField = 'date';
        $this->sortDirection = 'desc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.home.table', [
            'contests' => ContestDay::orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }

    public function delete(int $id): void
    {
        $this->deleteTarget = ContestDay::find($id);
    }

    public function confirmedDelete(): void
    {
        $this->deleteTarget->deleteAll();
        $this->deleteTarget = null;

        $this->emit('modal', 'hide', '#confirmDelete-contest');
        $this->emit('showToast', 'Du hast den Tag erfolgreich gelöscht.');
    }


}
