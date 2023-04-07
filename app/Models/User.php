<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Concerns\TwoFactorAuthenticatable\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, Notifiable, TwoFactorAuthenticatable;

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
