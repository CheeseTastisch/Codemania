<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Concerns\TwoFactorAuthenticatable\TwoFactorAuthenticatable;
use App\Notifications\Password\Reset;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, Notifiable, TwoFactorAuthenticatable, Searchable;

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
        'profile_picture_id',
        'email_verified_at',
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
        return $this->belongsToMany(Team::class)->withPivot('role', 'invited_at');
    }

    public function contests(): BelongsToMany
    {
        return $this->belongsToMany(Contest::class);
    }

    public function getTrainingTeamAttribute(): Team
    {
        if (array_key_exists('team.training', $this->relations)) return $this->getRelation('team.training');

        $trainingContest = ContestDay::whereTrainingOnly(true)->firstOrFail();
        $trainingTeam = $this->teams->where('contest_id', $trainingContest->contests()->first()->id)->firstOrFail();
        $this->setRelation('team.training', $trainingTeam);

        return $trainingTeam;
    }

    public function getTeamForContest(Contest $contest, bool|null $training = false): ?Team
    {
        if ($training) return $this->training_team;

        if (array_key_exists("team.$contest->id", $this->relations)) return $this->getRelation("team.$contest->id");

        $team = $this->teams->where('contest_id', $contest->id)->first();
        $this->setRelation("team.$contest->id", $team);

        return $team;
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new Reset(route('member.auth.password.reset', $this, $token)));
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

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'nickname' => $this->nickname,
            'email' => $this->email,
        ];
    }

}
