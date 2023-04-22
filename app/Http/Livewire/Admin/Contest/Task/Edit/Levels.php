<?php

namespace App\Http\Livewire\Admin\Contest\Task\Edit;

use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Level;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use StorageFile;

class Levels extends Component
{

    use WithPagination, WithSearch, WithSort, WithFileUploads;

    public Task $task;

    public $deleteId = null;

    public $level,
        $points,
        $descriptionFile;

    public function mount(): void
    {
        $this->sortField = 'level';
        $this->sortDirection = 'asc';
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.task.edit.levels', [
            'levels' => ($this->search ? Level::search($this->search) : Level::query())
                ->where('task_id', $this->task->id)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(5)
        ]);
    }

    public function create(): void
    {
        $this->validate();

        if (Level::whereTaskId($this->task->id)->whereLevel($this->level)->exists()) {
            $this->addError('level', 'Dieser Level existiert bereits.');
            return;
        }

        $level = Level::create([
            'level' => $this->level,
            'points' => $this->points,
            'description_file_id' => StorageFile::uploadFile($this->descriptionFile)->id,
            'task_id' => $this->task->id,
        ]);

        // TODO: Redirect to edit page
//        return redirect()->route('admin.contest.task.edit.levels', $level);
    }

    public function delete(): void
    {
        $this->validate([
            'deleteId' => 'required|integer|exists:levels,id',
        ]);

        Level::whereId($this->deleteId)->first()->deleteAll();

        $this->emit('modal', 'close', 'deleteLevel');
        $this->emit('showToast', 'Du hast das Level erfolgreich gelöscht.');
    }

    public function getRules(): array
    {
        return [
            'level' => 'required|integer|min:1',
            'points' => 'required|integer|min:1',
            'descriptionFile' => 'required|file|mimes:pdf|max:1024',
        ];
    }

}
