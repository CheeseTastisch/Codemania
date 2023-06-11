<?php

namespace App\Http\Livewire\Admin\Contest\Task\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Level;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use StorageFile;

class Levels extends Component
{

    use WithPagination, WithSearch, WithSort, WithFileUploads, ValidatesMultipleInputs;

    public Task $task;

    public $deleteId = null;

    public $level, $points, $description_file;

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

    public function create(): RedirectResponse|Redirector
    {
        $this->validateMultiple(['level', 'points', 'description_file']);

        $level = $this->task->levels()->create([
            'level' => $this->level,
            'points' => $this->points,
            'description_file_id' => StorageFile::uploadFile($this->description_file, null, '$level = \App\Models\Level::whereDescriptionFileId($this->id)->first();return auth()->user()?->is_admin || $level->task->contest->end_time->isPast() || auth()->user()?->getTeamForContest($level->task->contest)?->getLevelState($level) !== \App\Models\LevelState::LOCKED;')->id,
        ]);

        return redirect()->route('admin.contest.level.edit', $level);
    }

    public function delete(): void
    {
        $this->validateOnly('deleteId');

        $this->task->levels()->whereId($this->deleteId)->first()->delete();

        $this->emit('modal', 'close', 'deleteLevel');
        $this->emit('showToast', 'Du hast das Level erfolgreich gelöscht.');
    }

    public function getRules(): array
    {
        return [
            'level' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('levels', 'level')->where('task_id', $this->task->id),
            ],
            'points' => 'required|integer|min:1',
            'description_file' => 'required|file|mimes:pdf|max:1024',
            'deleteId' => 'required|integer|exists:levels,id',
        ];
    }

}
