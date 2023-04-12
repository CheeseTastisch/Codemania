<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelFileSubmission extends Model
{

    use SoftDeletes;

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

}
