<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelFileSubmission extends Model
{

    protected $fillable = [
        'level_submission_id',
        'level_file_id',
        'status',
        'uploaded_file_id'
    ];

    function levelSubmission(): BelongsTo
    {
        return $this->belongsTo(LevelSubmission::class);
    }

    function levelFile(): BelongsTo
    {
        return $this->belongsTo(LevelFile::class);
    }

    function uploadedFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'uploaded_file_id');
    }

}
