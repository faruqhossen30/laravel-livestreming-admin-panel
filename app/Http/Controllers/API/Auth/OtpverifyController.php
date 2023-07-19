<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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

        $smsurl = "http://bulksmsbd.net/api/smsapi?api_key={$smsAPIKey}&type=text&number={$mobileNumber}&senderid=8809617611065&message=AkashLive-OTP:{$request->user()->otp->otp}";

        $response = Http::get($smsurl);
        return $response->body();
    }

    public function sendNewOtp(Request $request)
    {

        $request->validate([
            'mobile' => 'required',
            'otp' => 'required',
        ]);


        $smsAPIKey = env('SMS_API_KEY');
        $mobileNumber = $request->mobile;
        $otp = $request->otp;

        $smsurl = "http://bulksmsbd.net/api/smsapi?api_key={$smsAPIKey}&type=text&number={$mobileNumber}&senderid=8809617611065&message=AkashLive-OTP:{$otp}";

        $response = Http::get($smsurl);
        $jsonResponse = $response->json();

        if ($response->successful()) {
            if ($jsonResponse['response_code'] == 202) {
                return response()->json([
                    'response_code' => 202,
                    'message' => 'OTP Send success ! Check your inbox message.',
                ]);
            } else if ($jsonResponse['response_code'] == 1002) {
                return response()->json([
                    'response_code' => 1002,
                    'message' => 'sender id not correct/sender id is disabled Code 1002',
                ]);
            } else if ($jsonResponse['response_code'] == 1005) {
                return response()->json([
                    'response_code' => 1005,
                    'message' => 'OTP Internal Error. Code 1005',
                ]);
            } else if ($jsonResponse['response_code'] == 1006) {
                return response()->json([
                    'response_code' => 1006,
                    'message' => 'OTP Validity Not Available Code 1006',
                ]);
            } else if ($jsonResponse['response_code'] == 1007) {
                return response()->json([
                    'response_code' => 1007,
                    'message' => 'OTP Balance Insufficient Code 1007',
                ]);
            }
        }else{
            return response()->json([
                'message' => 'Something went wrong. Please try again',
            ],422);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            // 'otp'=>'required',
        ]);

        $otp = session($request->mobile);

        return $otp;
    }

    public function otpVerify(Request $request, $otp)
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

            User::firstWhere('id', $user->id)->update(['otp_verified_at' => Carbon::now(), 'status' => true]);
            VerificationCode::firstWhere('user_id', $user->id)->update(['otp_verified_at' => Carbon::now(), 'status' => true]);

            $update = $request->user();

            $db = app('firebase.firestore')->database();
            $firebaseUser = $db->collection('users')->document($user->id);
            $firebaseUser->update([
                ['path' => 'status', 'value' => true]
            ]);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Account verify successfully !',
            ]);
        };

        return response()->json([
            'message' => 'OTP not matched.'
        ], 422);
    }
}
