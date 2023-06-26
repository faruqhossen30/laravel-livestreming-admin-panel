<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\Helpline;
use App\Models\Label;
use App\Models\Membership;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

    public function userlabelList()
    {
        $list = Label::get();
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $list
        ]);
    }

    public function membershipList()
    {
        $list = Membership::get();
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $list
        ]);
    }
    public function giftList()
    {
        // $list = Gift::get();
        $list = Cache::rememberForever('gifts', function () {
            return Gift::orderBy('diamond', 'asc')->get();
        });

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $list
        ]);
    }
    public function helpline()
    {
        // $list = Gift::get();
        $helpline = Cache::rememberForever('helpline', function () {
            return Helpline::first();
        });

        return $helpline;
    }
}
