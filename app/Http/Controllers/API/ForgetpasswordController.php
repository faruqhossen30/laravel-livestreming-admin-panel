<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Http\Request;

class ForgetpasswordController extends Controller
{
    public function forgetPassword(Request $request, $mobile)
    {
        $user = User::firstWhere('mobile',$mobile);

        if($user){
            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $user
            ]);
        }else{
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'No user found.'
            ],404);
        }


    }

    public function sendOTP(Request $request, $mobile)
    {
        $user = User::with('otp')->firstWhere('mobile',$mobile);
        $opt = VerificationCode::firstWhere('user_id',$user->id)->update(['otp'=>rand(100000, 999999)]);


        $smsAPIKey = env('SMS_API_KEY');

        $smsurl = "http://bulksmsbd.net/api/smsapi?api_key={$smsAPIKey}&type=text&number={$mobile}&senderid=8809617611065&message=AkashLive-OTP:{$user->otp->otp}";

        $response = Http::get($smsurl);
        return $response->body();


        return response()->json([
            'success' => true,
            'code' => 200,
            'data' =>$user
        ]);
    }


}
