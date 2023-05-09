<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use StorageFile;

class LevelFileSubmission extends Model
{

    protected $fillable = [
        'level_submission_id',
        'level_file_id',
        'status',
        'uploaded_file_id'
    ];

    public function levelSubmission(): BelongsTo
    {
        return $this->belongsTo(LevelSubmission::class);
    }

    public function levelFile(): BelongsTo
    {
        return $this->belongsTo(LevelFile::class);
    }

    public function uploadedFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'uploaded_file_id');
    }

    public function deleteAll(): void
    {
        StorageFile::deleteFile($this->uploadedFile);
        $this->delete();
    }

    public function evaluateStatus(): void
    {
        $correct = StorageFile::getFileContent($this->levelFile->solutionFile);
        $submitted = StorageFile::getFileContent($this->uploadedFile);

        $correctLines = collect(explode("\n", $correct))->map(fn($line) => rtrim($line));
        $submittedLines = collect(explode("\n", $submitted))->map(fn($line) => rtrim($line));

        $status = true;

        if ($correctLines->last() === '') $correctLines->pop();
        if ($submittedLines->last() === '') $submittedLines->pop();

        if ($correctLines->count() !== $submittedLines->count()) $status = false;
        else if ($correctLines->map(fn($line, $index) => trim($line) === trim($submittedLines[$index]))->some(fn($lineStatus) => !$lineStatus)) $status = false;

        $this->update(['status' => $status ? 'accepted' : 'rejected']);
    }

}
