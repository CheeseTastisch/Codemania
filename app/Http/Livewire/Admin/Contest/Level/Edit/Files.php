<?php

namespace App\Http\Livewire\Admin\Contest\Level\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use StorageFile;

class Files extends Component
{

    use WithPagination, WithFileUploads, ValidatesMultipleInputs;

    public Level $level;

    public $deleteId = null, $updateId = null;

    public $input_file, $solution_file;


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.level.edit.files', [
            'files' => $this->level->levelFiles()->paginate(10)
        ]);
    }

    public function create(): void
    {
        $this->validateMultiple(['input_file', 'solution_file']);

        $this->level->levelFiles()->create([
            'input_file_id' => StorageFile::uploadFile($this->input_file)->id,
            'solution_file_id' => StorageFile::uploadFile($this->solution_file)->id,
        ]);

        $this->input_file = null;
        $this->solution_file = null;

        $this->emit('modal', 'close', 'createFile');
        $this->emit('showToast', 'Du hast die Abgabe erfolgreich erstellt!');
    }

    public function delete(): void
    {
        $this->validateOnly('deleteId');

        $this->level->levelFiles()->where('id', $this->deleteId)->delete();
        $this->deleteId = null;

        $this->emit('modal', 'close', 'deleteFile');
        $this->emit('showToast', 'Du hast die Abgabe erfolgreich gelöscht!');
    }

    protected function getRules(): array
    {
        return [
            'input_file' => 'required|file|max:1024|mimes:txt',
            'solution_file' => 'required|file|max:1024|mimes:txt',
            'deleteId' => 'required|exists:level_files,id',
        ];
    }

}
