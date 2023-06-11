<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agora extends Model
{
    use HasFactory;
    protected $fillable = ['project_name', 'app_id','app_certificate'];
}
