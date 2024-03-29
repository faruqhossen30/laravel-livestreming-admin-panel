<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'email_verified_at', 'otp_verified_at', 'password', 'is_admin', 'is_user', 'status', 'rtctoken','avatar', 'diamond', 'balance', 'device_id', 'apps_id','name_updated_at','fcm_token','fcm_time','vip','vip_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_verified_at' => 'datetime',
        'name_updated_at' => 'datetime',
        'name_updated_at' => 'datetime',
        'fcm_time' => 'datetime',
        'vip_date' => 'datetime'
    ];

    public function otp()
    {
        return $this->hasOne(VerificationCode::class, 'user_id');
    }
    public function followers()
    {
        return $this->hasMany(Follower::class, 'user_id');
    }
}
