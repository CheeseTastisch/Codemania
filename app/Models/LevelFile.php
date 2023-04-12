<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelFile extends Model
{

    use SoftDeletes;

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

}
