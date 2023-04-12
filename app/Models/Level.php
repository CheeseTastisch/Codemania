<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{

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

}
