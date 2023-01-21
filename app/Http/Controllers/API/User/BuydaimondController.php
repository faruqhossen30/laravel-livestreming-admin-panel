<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuydaimondController extends Controller
{
    public function buyDaimond(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'amount'=>'required',
            'daimond'=>'required',
            'bank'=>'required',
            'number'=>'required',
            'transctionId'=>'required',
        ]);
        return "buy daimond";
    }
}
