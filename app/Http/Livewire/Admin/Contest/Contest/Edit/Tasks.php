<?php

namespace App\Http\Livewire\Admin\Contest\Contest\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Contest as ContestModel;
use App\Models\Task;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithPagination;

class Tasks extends Component
{

    use WithPagination, WithSearch, WithSort, ValidatesMultipleInputs;

    public ContestModel $contest;

    public $deleteId = null;

    public $name, $order;

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

    public function create(): RedirectResponse|Redirector
    {
        $this->validateMultiple(['name', 'order']);

        $name = trim($this->name);

        $task = $this->contest->tasks()->create([
            'name' => $name,
            'order' => $this->order,
        ]);

        return redirect()->route('admin.contest.task.edit', $task);
    }

    public function delete(): void
    {
        $this->validateOnly('deleteId');

        $this->contest->tasks()->whereId($this->deleteId)->delete();

        $this->emit('modal', 'close', 'deleteTask');
        $this->emit('showToast', 'Du hast die Aufgabe erfolgreich gelöscht.');
    }

    public function getRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('tasks', 'name')->where('contest_id', $this->contest->id)
            ],
            'order' => 'required|integer',
            'deleteId' => 'required|integer|exists:tasks,id',
        ];
    }



}
