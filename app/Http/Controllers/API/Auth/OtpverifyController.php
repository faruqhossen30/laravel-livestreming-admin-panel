<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OtpverifyController extends Controller
{
    public function sendOTP(Request $request)
    {
        if ($request->user()->otp_verified_at) {
            return response()->json([
                'message' => 'already veryfied'
            ]);
        }

        // http://bulksmsbd.net/api/smsapi?api_key=qZ73G0WKbLaMJTKqePLv&type=text&number=(Receiver)&senderid=8809617611065&message=

        $smsAPIKey = env('SMS_API_KEY');
        $mobileNumber = $request->user()->mobile;
        $otp = $request->user()->otp->otp;

        $smsurl = "http://bulksmsbd.net/api/smsapi?api_key={$smsAPIKey}&type=text&number={$mobileNumber}&senderid=8809617611065&message=AutoLive-OTP: {$request->user()->otp->otp}";

        $response = Http::get($smsurl);
        return $response->body();
    }

    public function otpVerify(Request $request,$otp)
    {
        $user = $request->user();

        if ($user->otp_verified_at) {
            return response()->json([
                'message' => 'Already veryfied'
            ]);
        }
        // 357945
        // return $request->opt;
        if ($user->otp->otp == $otp) {

            User::firstWhere('id', $user->id)->update(['otp_verified_at'=> Carbon::now()]);
            VerificationCode::firstWhere('user_id', $user->id)->update(['otp_verified_at'=> Carbon::now()]);

            $update = $request->user();

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Account verify successfully !',
            ]);

        };

        return response()->json([
            'message' => 'OTP not matched.'
        ]);
    }
}
