<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'author_id','time', 'withdraw_rate', 'withdraw_commission', 'payment_method', 'withdraw_type', 'account', 'diamond', 'diamond_commission', 'total_diamond','amount', 'status','comment'];

    protected $casts = [
        'fcm_time' => 'time'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
