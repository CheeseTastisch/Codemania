<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Task extends Model
{

    use Searchable;

    protected $fillable = [
        'name',
        'order',
        'contest_id'
    ];

    public function contest(): BelongsTo
    {
        return $this->belongsTo(Contest::class);
    }

    public function levels(): HasMany
    {
        return $this->hasMany(Level::class);
    }

    public function deleteAll(): void
    {
        $this->levels->each(fn($level) => $level->deleteAll());

        $this->delete();
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

}
