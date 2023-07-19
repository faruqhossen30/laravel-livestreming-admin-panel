<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'diamond', 'commission', 'total', 'img_url', 'user', 'edit_by'];

    protected $casts = [
        'diamond' => 'string',
        'commission' => 'string',
        'total' => 'string',
    ];
}
