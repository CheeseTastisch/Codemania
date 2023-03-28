<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{

    protected $fillable = [
        'name',
        'contest_id'
    ];

    public function contest(): BelongsTo
    {
        return $this->belongsTo(Contest::class);
    }

    function levels(): HasMany
    {
        return $this->hasMany(Level::class);
    }

}
