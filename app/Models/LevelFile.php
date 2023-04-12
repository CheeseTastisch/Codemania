<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use StorageFile;

class LevelFile extends Model
{

    protected $fillable = [
        'level_id',
        'solution_file_id'
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function solutionFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'solution_file_id');
    }

    public function levelFileSubmissions(): HasMany
    {
        return $this->hasMany(LevelFileSubmission::class);
    }

    public function deleteAll(): void
    {
        StorageFile::deleteFile($this->solutionFile);
        $this->levelFileSubmissions->each(fn($levelFileSubmission) => $levelFileSubmission->deleteAll());

        $this->delete();
    }

}
