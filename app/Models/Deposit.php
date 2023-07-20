<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'author_id', 'admin_deposit', 'payment_method', 'diamond', 'from_account', 'to_account', 'transaction_id', 'description', 'status', 'confirm_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
