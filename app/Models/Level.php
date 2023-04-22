<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use StorageFile;

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
