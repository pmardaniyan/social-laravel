<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasApiTokens;

    const TYPE_ADMIN = 'admin';
    const TYPE_USER = 'user';
    const TYPES = [self::TYPE_ADMIN, self::TYPE_USER];


    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'mobile',
        'email',
        'name',
        'password',
        'avatar',
        'website',
        'verify_code',
        'verify_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'verify_code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'verify_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function findForPassport($username)
    {
        $user = static::where('mobile', $username)->orWhere('email', $username)->first();

        return $user;
    }
}