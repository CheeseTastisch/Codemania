<?php

namespace App\Http\Livewire\Member\Contest\Training;

use App\Models\Level;
use App\Models\LevelFileSubmission;
use App\Models\LevelSubmission;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use StorageFile;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Pending extends Component
{

    use WithFileUploads;


    public Level $level;
    public ?LevelSubmission $levelSubmission;
    public Team $team;

    public $file;

    public $sourceFile;

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        if ($this->levelSubmission === null) {
            $this->levelSubmission = $this->team->levelSubmissions()
                ->create([
                    'team_id' => $this->team->id,
                    'level_id' => $this->level->id,
                ]);
        }

        return view('livewire.member.contest.training.pending');
    }

    public function downloadInputs(): BinaryFileResponse
    {
        return response()->download($this->level->downloadInputs(),
            $this->level->task->name . '-' . $this->level->level . '.zip')->deleteFileAfterSend(true);
    }

    public function updatedFile($value, $key): void
    {
        $this->validateOnly('file');

        $levelFileSubmission = $this->levelSubmission->levelFileSubmissions()
            ->create([
                'level_file_id' => $key,
                'uploaded_file_id' => StorageFile::uploadFile($this->file[$key], auth()->user())->id,
            ]);

        $levelFileSubmission->evaluateStatus();

        session()->flash('uploaded', $key);

        $this->file = null;
    }

    public function updatedSourceFile(): void
    {
        $this->validateOnly('sourceFile');

        $this->levelSubmission->update([
            'source_file_id' => StorageFile::uploadFile($this->sourceFile, auth()->user())->id,
        ]);

        session()->flash('uploaded', 'sourceFile');

        $this->sourceFile = null;
    }

    public function submit() {
        if (collect($this->level->levelFiles)
                ->map(fn ($levelFile) => $this->levelSubmission->getFileSubmission($levelFile))
                ->filter(fn ($levelFile) => $levelFile === null)
                ->count() != 0) {
            session()->flash('submissionError', 'Du must zuerst zu jeder Eingabe eine Abgabe hochladen.');
            return;
        }

        if ($this->levelSubmission->source_file_id === null) {
            session()->flash('submissionError', 'Du musst zuerst eine Quelldatei hochladen.');
            return;
        }

        $this->levelSubmission->evaluateStatus();
        $this->emitUp('refresh');
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
