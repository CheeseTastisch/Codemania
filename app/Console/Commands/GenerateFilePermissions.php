<?php

namespace App\Console\Commands;

use App\Models\Level;
use App\Models\LevelFile;
use App\Models\LevelFileSubmission;
use App\Models\LevelSubmission;
use Illuminate\Console\Command;

class GenerateFilePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'files:generate-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate file permissions for all uploaded files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating file permissions...');

        $this->info('Generating file permissions for Levels...');
        Level::all()->each(fn (Level $level) => $level->descriptionFile->update([
            'permission' => '$level = \App\Models\Level::whereDescriptionFileId($this->id)->first();return auth()->user()?->is_admin || $level->task->contest->end_time->isPast() || auth()->user()?->getTeamForContest($level->task->contest)?->getLevelState($level) !== \App\Models\LevelState::LOCKED;'
        ]));
        $this->info('Generated file permissions for Levels.');

        $this->info('Generating file permissions for LevelFiles...');
        LevelFile::all()->each(fn (LevelFile $levelFile) => $levelFile->inputFile->update([
            'permission' => '$level = \App\Models\LevelFile::whereInputFileId($this->id)->first()->level;return auth()->user()?->is_admin || $level->task->contest->end_time->isPast() || auth()->user()?->getTeamForContest($level->task->contest)?->getLevelState($level) !== \App\Models\LevelState::LOCKED;'
        ]))->each(fn (LevelFile $levelFile) => $levelFile->solutionFile->update([
            'permission' => 'return auth()->user()?->is_admin;'
        ]));
        $this->info('Generated file permissions for LevelFiles.');

        $this->info('Generating file permissions for LevelSubmissions...');
        LevelSubmission::all()->each(fn (LevelSubmission $levelSubmission) => $levelSubmission->sourceFile?->update([
            'permission' => '$submission = \App\Models\LevelSubmission::whereSourceFileId($this->id)->first();return auth()->user()?->is_admin || $submission->level->task->contest->end_time->isPast() || auth()->user()?->getTeamForContest($submission->level->task->contest)?->id === $submission->team_id;'
        ]));
        $this->info('Generated file permissions for LevelSubmissions.');

        $this->info('Generating file permissions for LevelFileSubmissions...');
        LevelFileSubmission::all()->each(fn (LevelFileSubmission $levelFileSubmission) => $levelFileSubmission->uploadedFile?->update([
            'permission' => '$submission = \App\Models\LevelFileSubmission::whereUploadedFileId($this->id)->first();return auth()->user()?->is_admin || $submission->levelSubmission->level->task->contest->end_time->isPast() || auth()->user()?->getTeamForContest($submission->levelSubmission->level->task->contest)?->id === $submission->levelSubmission->team_id;'
        ]));
        $this->info('Generated file permissions for LevelFileSubmissions.');

        $this->info('Generated file permissions.');
    }
}
