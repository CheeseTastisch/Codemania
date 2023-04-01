<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{

    protected $fillable = [
        'contest_day_id',
        'name',
        'logo_file_id',
        'banned'
    ];

    public function contestDay(): BelongsTo
    {
        return $this->belongsTo(ContestDay::class);
    }

    public function logoFile(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class);
    }

    public function contest(): BelongsToMany
    {
        return $this->belongsToMany(Contest::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivotValue('role');
    }

}
