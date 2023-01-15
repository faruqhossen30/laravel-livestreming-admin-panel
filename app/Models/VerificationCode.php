<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'otp',
        'otp_verified_at',
        'expire_at'
    ];
}
