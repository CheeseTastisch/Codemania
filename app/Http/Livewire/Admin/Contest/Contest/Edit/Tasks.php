<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Edit;

use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Contest as ContestModel;
use App\Models\Task;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Tasks extends Component
{

    use WithPagination, WithSearch, WithSort;

    public ContestModel $contest;

    public $deleteId = null;

    public $name,
        $order;

    public function mount(): void
    {
        $this->sortField = 'order';
        $this->sortDirection = 'asc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest.edit.tasks', [
            'tasks' => ($this->search ? Task::search($this->search) : Task::query())
                ->where('contest_id', $this->contest->id)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(5)
        ]);
    }

    public function create(): void
    {
        $this->validate();

        $name = trim($this->name);

        if (Task::whereContestId($this->contest->id)->whereName($name)->exists()) {
            $this->addError('name', 'Diese Aufgabe existiert bereits.');
            return;
        }

        $task = Task::create([
            'name' => $this->name,
            'order' => $this->order,
            'contest_id' => $this->contest->id,
        ]);

        // TODO: Redirect to edit page
    }

    public function delete(): void
    {
        Task::whereId($this->deleteId)->first()->deleteAll();

        $this->emit('modal', 'close', 'delete');
        $this->emit('showToast', 'Du hast die Aufgabe erfolgreich gelöscht.');
    }

    public function getRules(): array
    {
        return [
            'name' => 'required|string',
            'order' => 'required|integer',
        ];
    }



}
