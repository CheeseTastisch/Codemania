<?php

namespace App\Http\Livewire\Admin\Contest\ContestDay\Edit;

use App\Concerns\Livewire\ValidatesMultipleInputs;
use App\Concerns\Livewire\WithSearch;
use App\Concerns\Livewire\WithSort;
use App\Models\ContestDay;
use App\Models\ContestDaySponsor;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use StorageFile;

class Sponsors extends Component
{

    use WithSort, WithSearch, ValidatesMultipleInputs, WithFileUploads;

    public ContestDay $contestDay;

    public array $updateSponsor = [
        'name' => '',
        'url' => '',
        'background' => '',
        'logo' => null,
    ], $createSponsor = [
        'name' => '',
        'url' => '',
        'background' => 'light',
        'logo' => null,
    ];

    public ContestDaySponsor|null $deleteSponsor = null;

    public function mount(): void
    {
        $this->sortField = 'name';
        $this->sortDirection = 'asc';
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.contest-day.edit.sponsors', [
            'sponsors' => ($this->search ? ContestDaySponsor::search($this->search) : ContestDaySponsor::query())
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10)
        ]);
    }

    public function delete(int $id): void
    {
        $this->deleteSponsor = ContestDaySponsor::whereId($id)->first();
    }

    public function confirmedDelete(): void
    {
        $this->deleteSponsor->delete();
        $this->deleteSponsor = null;

        $this->emit('modal', 'hide', '#confirmDelete-sponsor');
        $this->emit('showToast', 'Du hast den Sponsor erfolgreich gelöscht.');
    }

    public function prepareUpdate(int $id): void
    {
        $sponsor = ContestDaySponsor::whereId($id)->first();

        $this->updateSponsor = [
            'id' => $sponsor->id,
            'name' => $sponsor->name,
            'url' => $sponsor->url,
            'background' => $sponsor->background,
        ];

        $this->emit('modal', 'show', '#update-sponsor');
    }

    public function updateSponsor(): void
    {
        $this->validateMultiple(['updateSponsor.name', 'updateSponsor.url', 'updateSponsor.background', 'updateSponsor.logo']);

        $sponsor = ContestDaySponsor::whereId($this->updateSponsor['id'])->first();

        $sponsor->update([
            'name' => $this->updateSponsor['name'],
            'url' => $this->updateSponsor['url'],
            'background' => $this->updateSponsor['background'],
        ]);

        if (array_key_exists('logo', $this->updateSponsor) && $this->updateSponsor['logo'] != null) {
            $file = StorageFile::uploadFile($this->updateSponsor['logo']);
            $sponsor->update(['logo_id' => $file->id]);

            $this->updateSponsor['logo'] = null;
        }

        $this->emit('modal', 'hide', '#update-sponsor');
        $this->emit('showToast', 'Du hast den Sponsor erfolgreich aktualisiert.');
    }

    public function createSponsor(): void
    {
        $this->validateMultiple(['createSponsor.name', 'createSponsor.url', 'createSponsor.background', 'createSponsor.logo']);

        $file = StorageFile::uploadFile($this->createSponsor['logo']);

        ContestDaySponsor::create([
            'contest_day_id' => $this->contestDay->id,
            'name' => $this->createSponsor['name'],
            'url' => $this->createSponsor['url'],
            'background' => $this->createSponsor['background'],
            'logo_id' => $file->id,
        ]);

        $this->createSponsor = [
            'name' => '',
            'url' => '',
            'background' => 'light',
            'logo' => null,
        ];

        $this->emit('modal', 'hide', '#create-sponsor');
        $this->emit('showToast', 'Du hast den Sponsor erfolgreich erstellt.');
    }

    protected function getRules(): array
    {
        return [
            'updateSponsor.name' => 'required|string',
            'updateSponsor.url' => 'required|url',
            'updateSponsor.background' => 'required|in:light,dark',
            'updateSponsor.logo' => 'nullable|image',

            'createSponsor.name' => 'required|string',
            'createSponsor.url' => 'required|url',
            'createSponsor.background' => 'required|in:light,dark',
            'createSponsor.logo' => 'required|image',
        ];
    }

}
