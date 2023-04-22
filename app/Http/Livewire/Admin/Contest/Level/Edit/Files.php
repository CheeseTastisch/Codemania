<?php

namespace App\Http\Livewire\Admin\Contest\Level\Edit;

use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Files extends Component
{

    use WithPagination, WithFileUploads;

    public Level $level;

    public $deleteId = null,
        $updateId = null;

    public $inputFile,
        $solutionFile;


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.level.edit.files', [
            'files' => $this->level->levelFiles()->paginate(10)
        ]);
    }

    public function create(): void
    {
        $this->validate();

        $this->level->levelFiles()->create([
            'input_file' => $this->inputFile->store('level-files'),
            'solution_file' => $this->solutionFile->store('level-files'),
        ]);

        $this->inputFile = null;
        $this->solutionFile = null;

        $this->emit('modal', 'close', 'createFile');
        $this->emit('showToast', 'Du hast die Abgabe erfolgreich erstellt!');
    }

    public function delete(): void
    {
        $this->validate([
            'deleteId' => 'required|exists:level_files,id'
        ]);

        $this->level->levelFiles()->where('id', $this->deleteId)->delete();
        $this->deleteId = null;

        $this->emit('modal', 'close', 'deleteFile');
        $this->emit('showToast', 'Du hast die Abgabe erfolgreich gelöscht!');
    }

    protected function getRules(): array
    {
        return [
            'inputFile' => 'required|file|max:1024|mimes:txt',
            'solutionFile' => 'required|file|max:1024|mimes:txt',
        ];
    }

}
