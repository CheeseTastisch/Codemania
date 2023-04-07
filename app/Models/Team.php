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

    public function contests(): BelongsToMany
    {
        return $this->belongsToMany(Contest::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivotValue('role');
    }

    public function getPoints(Contest $contest, bool $ignoreFreeze = false): int|null
    {
        if (!$this->contests->contains($contest)) return null;

        $points = 0;
        $contest->tasks->flatMap(fn($task) => $task->levels)->each(function($level) use (&$points, $ignoreFreeze) {
            $level->levelSubmissions->where('team_id', $this->id)->each(function($levelSubmission) use (&$points, $ignoreFreeze) {
                if ($levelSubmission->shouldBetRated($ignoreFreeze) && $levelSubmission->status === 'accepted')
                    $points += $levelSubmission->points;
            });
        });

        return $points;
    }

    public function getTotalResolutionTime(Contest $contest, bool $ignoreFreeze = false): int|null
    {
        if (!$this->contests->contains($contest)) return null;

        $resolution = 0;
        $contest->tasks->flatMap(fn($task) => $task->levels)->each(function($level) use (&$resolution, $ignoreFreeze, $contest) {
            $level->levelSubmissions->where('team_id', $this->id)->each(function($levelSubmission) use (&$resolution, $ignoreFreeze, $contest) {
                if ($levelSubmission->shouldBetRated($ignoreFreeze)) {
                    if ($levelSubmission->status === 'accepted') $resolution += $levelSubmission->status_changed_at->diffInSeconds($contest->start_at);
                    else if ($levelSubmission->status === 'rejected') $resolution += $contest->wrong_solution_penalty * 60;
                }
            });
        });

        return $resolution;
    }

    public function getPlace(Contest $contest, bool $ignoreFreeze = false): int|null
    {
        if (!$this->contests->contains($contest)) return null;
        return $contest->getLeaderboard($ignoreFreeze)->get($this->id);
    }

}
