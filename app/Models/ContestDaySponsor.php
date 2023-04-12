<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContestDaySponsor extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'contest_day_id',
        'name',
        'url',
        'logo_id',
        'background',
    ];

    public function contestDay(): BelongsTo
    {
        return $this->belongsTo(ContestDay::class);
    }

    public function logo(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'logo_id');
    }

}
