<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawSetting extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'diamond_rate', 'normar_widthraw_commission','urgent_widthraw_commission','description','minimum_widthraw','next_widthraw','maximum_widthraw'];

}
