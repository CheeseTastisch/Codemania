<?php

namespace App\Http\Livewire\Admin\Contest\Team\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use StorageFile;

class General extends Component
{

    use WithFileUploads;

    public Team $team;

    public $name, $logo;

    public $block_reason = null;

    public function mount(): void
    {
        $this->name = $this->team->name;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.team.edit.general');
    }

    public function updatedName(): void
    {
        $this->validateOnly('name');

        $this->team->update([
            'name' => trim($this->name),
        ]);

        session()->flash('updated', 'name');
    }

    public function updatedLogo(): void
    {
        $this->validateOnly('logo');

        $this->team->update([
            'logo_file_id' => StorageFile::uploadFile($this->logo, auth()->user())->id
        ]);

        $this->logo = null;

        session()->flash('updated', 'logo');
    }


    public function unblock(): void
    {

        $this->team->update([
            'is_blocked' => false,
            'block_reason' => null,
            'blocked_by' => null,
        ]);

        $this->emit('showToast', 'Du hast das Team erfolgreich entsperrt.');
        $this->emit('modal', 'close', 'unblockTeam');
    }

    public function block(): void
    {
        $this->validateOnly('block_reason');

        $this->team->update([
            'is_blocked' => true,
            'block_reason' => $this->block_reason,
            'blocked_by' => auth()->id(),
        ]);

        $this->emit('showToast', 'Du hast das Team erfolgreich gesperrt.');
        $this->emit('modal', 'close', 'blockTeam');
    }

    public function getRules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('teams', 'name')->ignore($this->team->id)->where('contest_id', $this->team->contest_id)
            ],
            'logo' => 'nullable|image|max:1024',
            'block_reason' => 'nullable|string|between:5,1023',
        ];
    }

}
