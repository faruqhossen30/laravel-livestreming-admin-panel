<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpverifyController extends Controller
{
    public function sendOTP(Request $request)
    {
        if($request->user()->otp_verified_at){
            return response()->json([
                'message' => 'already veryfied'
            ]);
        }

        http://bulksmsbd.net/api/smsapi?api_key=qZ73G0WKbLaMJTKqePLv&type=text&number=(Receiver)&senderid=8809617611065&message=

        return env('SMS_API_KEY');




        // return $request->user()->otp->otp;
    }
}
