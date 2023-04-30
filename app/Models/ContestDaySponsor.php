<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class ContestDaySponsor extends Model
{

    use Searchable;

    protected $fillable = [
        'contest_day_id',
        'name',
        'url',
        'logo_id',
        'background',
        'on_canvas',
    ];

    public function contestDay(): BelongsTo
    {
        return $this->belongsTo(ContestDay::class);
    }

    public function logo(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'logo_id');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
        ];
    }

}
