<?php

namespace App\Http\Livewire\Admin;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\Meme;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use StorageFile;

class Memes extends Component
{

    use WithPagination, WithFileUploads, ValidatesMultipleInputs;

    public $file,
        $for = 'accepted';
    public $deleteId = null;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.memes', [
                'memes' => Meme::paginate(10, ['*'], 'meme')
            ]
        );
    }

    public function create(): void
    {
        $this->validateMultiple(['file', 'for']);

        Meme::create([
            'uploaded_file_id' => StorageFile::uploadFile($this->file)->id,
            'for' => $this->for
        ]);

        $this->file = null;
        $this->for = 'accepted';

        $this->emit('modal', 'close', 'createMeme');
        $this->emit('showToast', 'Du hast das Meme erfolgreich erstellt.');
    }

    public function delete(): void
    {
        $this->validateOnly('deleteId');

        Meme::whereId($this->deleteId)->delete();

        $this->emit('modal', 'close', 'deleteMeme');
        $this->emit('showToast', 'Du hast das Meme erfolgreich gelöscht.');
    }

    protected function getRules(): array
    {
        return [
            'file' => 'required|image',
            'for' => 'required|in:accepted,rejected,unknown',
            'deleteId' => 'nullable|exists:memes,id'
        ];
    }

}
