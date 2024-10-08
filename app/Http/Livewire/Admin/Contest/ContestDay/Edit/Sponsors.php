<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\ContestDay;
use App\Models\ContestDaySponsor;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use StorageFile;

class Sponsors extends Component
{

    use WithPagination, WithSort, WithSearch, ValidatesMultipleInputs, WithFileUploads;

    public ContestDay $contestDay;

    public array $createSponsor = [
        'name' => '',
        'url' => '',
        'background' => 'light',
        'logo' => null,
        'on_canvas' => false,
    ];

    public $updateSponsor, $updateId = null;

    public $deleteId = null;

    public function mount(): void
    {
        $this->sortField = 'name';
        $this->sortDirection = 'asc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest-day.edit.sponsors', [
            'sponsors' => ($this->search ? ContestDaySponsor::search($this->search) : ContestDaySponsor::query())
                ->where('contest_day_id', $this->contestDay->id)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(5, ['*'], 'sponsor')
        ]);
    }

    public function create(): void
    {
        $this->validateMultiple(['createSponsor.name', 'createSponsor.url', 'createSponsor.background', 'createSponsor.logo', 'createSponsor.on_canvas']);

        if (ContestDaySponsor::whereName($this->createSponsor['name'])
            ->whereContestDayId($this->contestDay->id)
            ->exists()) {
            $this->addError('createSponsor.name', 'Dieser Sponsor existiert bereits.');
            return;
        }

        ContestDaySponsor::create([
            'contest_day_id' => $this->contestDay->id,
            'name' => $this->createSponsor['name'],
            'url' => $this->createSponsor['url'],
            'background' => $this->createSponsor['background'],
            'logo_id' => StorageFile::uploadFile($this->createSponsor['logo'])->id,
            'on_canvas' => $this->createSponsor['on_canvas'],
        ]);

        $this->createSponsor = [
            'name' => '',
            'url' => '',
            'background' => 'light',
            'logo' => null,
            'on_canvas' => false,
        ];

        $this->emit('modal', 'close', 'createSponsor');
        $this->emit('showToast', 'Du hast den Sponsor erfolgreich erstellt.');
    }

    public function update(): void
    {
        $this->validateMultiple(['updateSponsor.name', 'updateSponsor.url', 'updateSponsor.background', 'updateSponsor.logo', 'updateSponsor.on_canvas']);

        $this->contestDay->sponsors()->whereId($this->updateId)->update([
            'name' => $this->updateSponsor['name'],
            'url' => $this->updateSponsor['url'],
            'background' => $this->updateSponsor['background'],
            'on_canvas' => $this->updateSponsor['on_canvas'],
        ]);

        if (array_key_exists('logo', $this->updateSponsor) && $this->updateSponsor['logo'] != null) {
            $file = StorageFile::uploadFile($this->updateSponsor['logo']);
            $this->contestDay->sponsors()->whereId($this->updateId)->update(['logo_id' => $file->id]);
        }

        $this->emit('modal', 'close', 'updateSponsor');
        $this->emit('showToast', 'Du hast den Sponsor erfolgreich aktualisiert.');
    }

    public function delete(): void
    {
        $this->validateOnly('deleteId');

        $sponsor = ContestDaySponsor::whereId($this->deleteId)->first();

        $sponsor->delete();

        $this->emit('modal', 'close', 'deleteSponsor');
        $this->emit('showToast', 'Du hast den Sponsor erfolgreich gelöscht.');
    }

    protected function getRules(): array
    {
        return [
            'createSponsor.name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('contest_day_sponsors', 'name')->where('contest_day_id', $this->contestDay->id)
            ],
            'createSponsor.url' => 'required|url',
            'createSponsor.background' => 'required|in:light,dark',
            'createSponsor.logo' => 'required|image',
            'createSponsor.on_canvas' => 'required|boolean',

            'updateSponsor.name' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('contest_day_sponsors', 'name')->where('contest_day_id', $this->contestDay->id)->ignore($this->updateId)
            ],
            'updateSponsor.url' => 'required|url',
            'updateSponsor.background' => 'required|in:light,dark',
            'updateSponsor.logo' => 'nullable|image',
            'updateSponsor.on_canvas' => 'required|boolean',

            'deleteId' => 'required|integer|exists:contest_day_sponsors,id',
        ];
    }

}
