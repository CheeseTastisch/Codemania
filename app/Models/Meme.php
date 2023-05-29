<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Meme extends Model
{

    protected $fillable = [
        'uploaded_file_id',
        'for',
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class);
    }

}
