<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agora;
use Illuminate\Http\Request;

class OptionapiController extends Controller
{
    public function daimondRate()
    {
        $price = option('daimond_rate');
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $price,
            'rate' => $price,
        ]);
    }

    public function daimondWidthRate()
    {
        $price = option('withdraw_rate');
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $price,
            'rate' => $price,
        ]);
    }

    public function agora()
    {
        $agora = Agora::first();


        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $agora
        ]);
    }
}
