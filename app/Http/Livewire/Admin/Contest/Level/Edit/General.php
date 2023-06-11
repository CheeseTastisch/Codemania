<?php

namespace App\Http\Livewire\Admin\Contest\Level\Edit;

use App\Models\Level;
use Livewire\Component;
use Livewire\WithFileUploads;
use StorageFile;

class General extends Component
{

    use WithFileUploads;

    public Level $level;

    public $levelNumber, $points, $instantlyRated, $descriptionFile;

    public function mount(): void
    {
        $this->levelNumber = $this->level->level;
        $this->points = $this->level->points;
        $this->instantlyRated = $this->level->instantly_rated;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.contest.level.edit.general');
    }

    public function updatedLevelNumber(): void
    {
        $this->validateOnly('levelNumber');

        if (Level::whereTaskId($this->level->task_id)->whereLevel($this->levelNumber)->exists()) {
            $this->addError('levelNumber', 'Dieses Level existiert bereits.');
            return;
        }

        $this->level->update(['level' => $this->levelNumber]);
        session()->flash('updated', 'levelNumber');
    }

    public function updatedPoints(): void
    {
        $this->validateOnly('points');

        $this->level->update(['points' => $this->points]);
        session()->flash('updated', 'points');
    }

    public function updatedInstantlyRated(): void
    {
        $this->validateOnly('instantlyRated');

        $this->level->update(['instantly_rated' => $this->instantlyRated]);
        session()->flash('updated', 'instantlyRated');
    }

    public function updatedDescriptionFile(): void
    {
        $this->validateOnly('descriptionFile');

        $this->level->update(['description_file_id' => StorageFile::uploadFile($this->descriptionFile, null, '$level = \App\Models\Level::whereDescriptionFileId($this->id)->first();return auth()->user()?->is_admin || $level->task->contest->end_time->isPast() || auth()->user()?->getTeamForContest($level->task->contest)?->getLevelState($level) !== \App\Models\LevelState::LOCKED;')->id]);
        $this->descriptionFile = null;

        session()->flash('updated', 'descriptionFile');
    }

    protected function getRules(): array
    {
        return [
            'levelNumber' => 'required|integer|min:1',
            'points' => 'required|integer|min:1',
            'instantlyRated' => 'required|boolean',
            'descriptionFile' => 'nullable|file|mimes:pdf|max:1024',
        ];
    }

}
