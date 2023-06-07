<?php

namespace App\Models;

use File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use StorageFile;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use ZipArchive;

class Level extends Model
{

    use Searchable;

    protected $fillable = [
        'level',
        'task_id',
        'points',
        'instantly_rated',
        'description_file_id'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function descriptionFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'description_file_id');
    }

    public function levelFiles(): HasMany
    {
        return $this->hasMany(LevelFile::class);
    }

    public function levelSubmissions(): HasMany
    {
        return $this->hasMany(LevelSubmission::class);
    }

    public function downloadInputs(): string
    {
        $zipPath = storage_path('app/public/level/' . $this->id . '.zip');
        if (File::exists($zipPath)) File::delete($zipPath);

        $zip = new ZipArchive();
        $zip->open($zipPath, ZipArchive::CREATE);

        $zip->addFromString('description.' . $this->descriptionFile->extension, StorageFile::getFileContent($this->descriptionFile));

        $this->levelFiles
            ->map(fn($levelFile) => $levelFile->inputFile)
            ->map(fn($uploadedFile) => StorageFile::getFileContent($uploadedFile))
            ->map(fn($content, $index) => ['content' => $content, 'index' => $index + 1])
            ->sortBy('index')
            ->each(fn($file) => $zip->addFromString($file['index'] . '.in', $file['content']));

        $zip->close();

        return $zipPath;
    }

    public function deleteAll(): void
    {
        StorageFile::deleteFile($this->descriptionFile);

        $this->levelFiles->each(fn($levelFile) => $levelFile->deleteAll());
        $this->levelSubmissions->each(fn($levelSubmission) => $levelSubmission->deleteAll());

        $this->delete();
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->task->name,
        ];
    }

}
