<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\File;
use Storage;
use Str;

class UploadedFile extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'extension',
        'storage_path',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
