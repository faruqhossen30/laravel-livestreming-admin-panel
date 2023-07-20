<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'device_id', 'description', 'author_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
