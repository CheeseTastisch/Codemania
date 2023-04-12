<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Concerns\TwoFactorAuthenticatable\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, Notifiable, TwoFactorAuthenticatable, SoftDeletes;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'nickname',
        'display_name_type',
        'birthday',
        'class',
        'school',
        'gender',
        'about',
        'theme',
        'profile_picture_id'
    ];

    protected $hidden = [
        'two_factor_secret',
        'two_factor_recovery_codes',
        'confirmed_two_factor_at',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birthday' => 'date',
        'email_verified_at' => 'timestamp',
        'confirmed_two_factor_at' => 'timestamp',
    ];

    public function profilePicture(): BelongsTo
    {
        return $this->belongsTo(UploadedFile::class, 'profile_picture_id');
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)->withPivot('role');
    }

    public function getTrainingTeamAttribute(): Team
    {
        if (array_key_exists('training_team', $this->relations)) return $this->getRelation('training_team');

        $trainingTeam =  $this->teams->where('contest_day_id', ContestDay::where('training_only', true)->firstOrFail()->id)->firstOrFail();
        $this->setRelation('training_team', $trainingTeam);

        return $trainingTeam;
    }

    public function getTeamForContest(Contest $contest, bool|null $training = false): ?Team
    {
        if (array_key_exists("team_for_contest_$contest->id", $this->relations)) return $this->getRelation("team_for_contest_$contest->id");

        $teams = $this->teams
            ->filter(fn ($team) => $team->contestDay->training_only === $training || $training === null)
            ->filter(fn ($team) => $team->contests->contains($contest));

        $team = $teams->count() >= 1 ? $teams->filter(fn ($team) => !$team->contest_day->training_only)->first() : $teams->first();
        $this->setRelation("team_for_contest_$contest->id", $team);

        return $team;
    }

    public function getFullNameAttribute(): string
    {
        return "$this->first_name $this->last_name";
    }

    public function getDisplayNameAttribute(): string
    {
        return match ($this->display_name_type) {
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'nickname' => $this->nickname,
            default => $this->full_name,
        };
    }

}
