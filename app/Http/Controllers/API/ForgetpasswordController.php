<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;
use App\Models\ForgetPassword;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgetpasswordController extends Controller
{
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'mobile' => 'required'
        ]);

        $user = User::firstWhere('mobile',$request->mobile);

        if(!$user){
            return response()->json([
                'message' => 'Account not found this mobile number.',
            ],422);
        }

        $find = ForgetPassword::firstWhere('mobile', $request->mobile);
        if ($find) {
            $dt = Carbon::parse($find->updated_at);
            $now = Carbon::now();
            $diff = $dt->diffInMinutes($now);

            if ($diff > 0) {
                $update = $find->update(
                    [
                        'mobile' => $request->mobile,
                        'otp' => rand(111111, 999999),
                    ]
                );

                return response()->json([
                    'message' => 'OPT send success, Please your message inbox.',
                    'minute' => $diff,
                    'data' => $update,
                ]);
            }else{
                return response()->json([
                    'message' => 'Too many attept to send otp. Try again after some times',
                    'minute' => $diff,
                ],422);
            }

        }

        $create = ForgetPassword::create([
            'mobile' => $request->mobile,
            'otp' => rand(111111, 999999),
        ]);

        return response()->json([
            'message' => 'OPT send success, Please your message inbox.',
            'data' => $create,
        ]);
    }

    public function forgetPasswordOtpVerify(Request $request){
        $request->validate([
            'mobile'=>'required',
            'code'=>'required',
        ]);

        $forgetpassword = ForgetPassword::firstWhere('mobile', $request->mobile);

        if($forgetpassword){
            if($forgetpassword->otp==$request->code){
                return response()->json([
                    'message'=> 'OTP Verify Successfully.'
                ]);
            }else{
                return response()->json([
                    'message'=> 'OTP is wring !'
                ],422);
            }
        }else{
            return response()->json([
                'message'=> 'Opps ! Something went wrong'
            ],422);
        }


    }


    public function changePasswordConfirm(Request $request){
        $request->validate([
            'mobile'=>'required',
            'code'=>'required',
            'password'=>'required|min:4',
        ]);

        $forgetpassword = ForgetPassword::firstWhere('mobile', $request->mobile);

        if($forgetpassword->otp==$request->code){

            $user = User::firstWhere('mobile',$forgetpassword->mobile)->update([
                'password'=> Hash::make($request->password)
            ]);

            return response()->json([
                'message'=> 'Successfully password change.',
            ]);
        }

        return response()->json([
            'message'=> 'Something went wrong',
        ],422);


    }


    public function sendOTP(Request $request, $mobile)
    {
        $user = User::with('otp')->firstWhere('mobile', $mobile);
        $opt = VerificationCode::firstWhere('user_id', $user->id)->update(['otp' => rand(100000, 999999)]);


        $smsAPIKey = env('SMS_API_KEY');

        $smsurl = "http://bulksmsbd.net/api/smsapi?api_key={$smsAPIKey}&type=text&number={$mobile}&senderid=8809617611065&message=AkashLive-OTP:{$user->otp->otp}";

        $response = Http::get($smsurl);
        return $response->body();


        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $user
        ]);
    }
}
