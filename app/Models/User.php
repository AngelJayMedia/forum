<?php

namespace App\Models;

use App\Traits\ModelHelpers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use ModelHelpers;
    use Notifiable;

    const DEFAULT = 1;
    const MODERATOR = 2;
    const ADMIN = 3; 

    const TABLE = 'users';

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string {
        return $this->name;
    }

    public function emailAdress(): string {
        return $this->email;
    }

    public function bio(): string {
        return $this->bio;
    }

    public function type(): int {
        return (int) $this->type;
    }

    public function isModerator(): bool {
        return $this->type() === self::MODERATOR;
    }

    public function isAdmin(): bool 
    {
        return $this->type() === self::ADMIN; 
    }

    public function email(): string {
        return $this->email; 
    }
}
