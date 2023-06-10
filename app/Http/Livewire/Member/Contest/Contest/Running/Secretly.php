<?php

namespace App\Http\Livewire\Member\Contest\Contest\Running;

use App\Models\Level;
use App\Models\LevelSubmission;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use StorageFile;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Secretly extends Component
{

    use WithFileUploads;

    public Level $level;
    public ?LevelSubmission $levelSubmission;
    public Team $team;
    public ?LevelSubmission $newLevelSubmission;

    public $file;

    public $sourceFile;

    public function mount(): void
    {
        $this->newLevelSubmission = $this->team->levelSubmissions
            ->where('level_id', $this->level->id)
            ->filter(fn($levelSubmission) => $levelSubmission->status === 'pending')
            ->sortByDesc('status_changed_at')
            ->first();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.contest.contest.running.secretly');
    }


    public function downloadInputs(): BinaryFileResponse
    {
        return response()->download($this->level->downloadInputs(),
            $this->level->task->name . '-' . $this->level->level . '.zip')->deleteFileAfterSend(true);
    }

    public function updatedFile($value, $key): void
    {
        $this->validateOnly('file');

        if ($this->newLevelSubmission === null) {
            $this->newLevelSubmission = $this->team->levelSubmissions()
                ->create([
                    'team_id' => $this->team->id,
                    'level_id' => $this->level->id,
                ]);
        }

        $this->newLevelSubmission->levelFileSubmissions()
            ->create([
                'level_file_id' => $key,
                'uploaded_file_id' => StorageFile::uploadFile($this->file[$key], auth()->user())->id,
            ]);

        session()->flash('uploaded', $key);
        $this->file = null;
    }

    public function updatedSourceFile(): void
    {
        $this->validateOnly('sourceFile');

        if ($this->newLevelSubmission === null) {
            $this->newLevelSubmission = $this->team->levelSubmissions()
                ->create([
                    'team_id' => $this->team->id,
                    'level_id' => $this->level->id,
                ]);
        }

        $this->newLevelSubmission->update([
            'source_file_id' => StorageFile::uploadFile($this->sourceFile, auth()->user())->id,
        ]);

        session()->flash('uploaded', 'source');
        $this->sourceFile = null;
    }

    public function submit(): void
    {
        if ($this->newLevelSubmission === null) {
            $this->newLevelSubmission = $this->team->levelSubmissions()
                ->create([
                    'team_id' => $this->team->id,
                    'level_id' => $this->level->id,
                ]);
        }

        if (collect($this->level->levelFiles)
                ->map(fn ($levelFile) => $this->newLevelSubmission->getFileSubmission($levelFile))
                ->filter(fn ($levelFile) => $levelFile === null)
                ->count() != 0) {
            session()->flash('submissionError', 'Du must zuerst zu jeder Eingabe eine Abgabe hochladen.');
            return;
        }

        if ($this->newLevelSubmission->source_file_id === null) {
            session()->flash('submissionError', 'Du musst zuerst eine Quelldatei hochladen.');
            return;
        }

        $this->newLevelSubmission->evaluateStatus();
        $this->emitUp('$refresh');
    }

    protected function getRules(): array
    {
        return [
            'file' => 'required|array',
            'file.*' => 'required|file',
            'sourceFile' => 'required|file',
        ];
    }

}
