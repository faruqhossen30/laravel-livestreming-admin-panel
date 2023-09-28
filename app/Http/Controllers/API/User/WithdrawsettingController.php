<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\WithdrawSetting;
use Illuminate\Http\Request;

class WithdrawsettingController extends Controller
{
    public function index()
    {
        $withdrawsetting = WithdrawSetting::first();
        return $withdrawsetting;
    }
}
