<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class ListapiController extends Controller
{
    public function paymentGateway()
    {
        $list = PaymentGateway::get();
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $list
        ]);
    }
}
