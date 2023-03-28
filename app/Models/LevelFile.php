<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelFile extends Model
{

    protected $fillable = [
        'level_id',
        'solution_file_id'
    ];

    function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    function solutionFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'solution_file_id');
    }

    function levelFileSubmissions(): HasMany
    {
        return $this->hasMany(LevelFileSubmission::class);
    }

}
