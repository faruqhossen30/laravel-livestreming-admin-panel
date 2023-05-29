<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'method', 'amount', 'from_account', 'to_account', 'transaction_id', 'status'];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
