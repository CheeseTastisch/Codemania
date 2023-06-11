<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UploadedFile extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'extension',
        'mime_type',
        'storage_path',
        'permission',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hasPermission(): bool {
        return eval($this->permission ?? 'return true;') == true;
    }

}
