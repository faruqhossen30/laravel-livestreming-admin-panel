<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\BlockUser;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Core\Timestamp;
use Google\Cloud\Firestore\FieldValue;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $data = $request->all();
        // $validator = Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'mobile' => ['required', 'string', 'max:15', 'unique:users'],
        //     'password' => ['required', 'string', 'min:4'],
        //     'device_id' => ['required'],
        // ],[
        //     'device_id.required' => 'Device address not foound. Update app or Contact with helpline.',
        // ]);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'device_id' => ['required'],
        ], [
            'device_id.required' => 'Device address not foound. Update app or Contact with helpline.',
        ]);

        $checkblock = BlockUser::firstWhere('device_id', $request->device_id);
        // return $checkblock;
        if ($checkblock) {
            return response()->json([
                'message' => 'Your mobile has been block.',
            ], 403);
        }

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'device_id' => $request->device_id,
            'status' => false,
        ]);

        if ($user) {
            VerificationCode::create([
                'user_id' => $user->id,
                'otp' => rand(100000, 999999),
                'expire_at' => Carbon::now()->addMinutes(10)
            ]);

            $token = $user->createToken(uniqid())->plainTextToken;
            $user['token'] = $token;
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'User Successfully Registered !',
            'token' => $token,
            'data' => $user
        ]);
    }

    public function registerNew(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'device_id' => ['required'],
        ], [
            'device_id.required' => 'Device address not foound. Update app or Contact with helpline.',
        ]);

        $checkblock = BlockUser::firstWhere('device_id', $request->device_id);
        if ($checkblock) {
            return response()->json([
                'message' => 'Your mobile has been block.',
            ], 403);
        }

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'device_id' => $request->device_id,
            'status' => 1,
        ]);

        if ($user) {
            $token = $user->createToken(uniqid())->plainTextToken;
            $user['token'] = $token;
            $db = new FirestoreClient([
                'projectId' => 'akashliveapp',
            ]);
            $db->collection('users')->document($user->id)->set([
                'id' => $user->id,
                'uid' => strval($user->id),
                'name' => $request->name,
                'mobile' => $request->mobile,
                'status' => true,
                'avatar' => null,
                'diamond' => 0,
                'label' => 0,
                'transaction' => 0,
                'balance' => 0,
                'device_id' => $request->device_id,
                'appsId' => null,
                'createdAt' => FieldValue::serverTimestamp(),
            ]);
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'User Successfully Registered !',
            'token' => $token,
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {

        $request->validate([
            'mobile'         => 'required',
            'password'      => 'required',
            'device_id'      => 'required'
        ], [
            'device_id.required' => 'Device address not foound. Update app or Contact with helpline.',
        ]);

        //
        try {
            // if (Auth::attempt($request->only('mobile', 'password'))) {
            $checkblock = BlockUser::firstWhere('device_id', $request->device_id);
            // return $checkblock;
            if ($checkblock) {
                return response()->json([
                    'message' => 'Your mobile has been block.',
                ], 403);
            }
            if (Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password, 'status' => 1])) {
                $user = Auth::user();
                $user->tokens()->delete();
                $token = $user->createToken(uniqid())->plainTextToken;
                $user['token'] = $token;

                $checkdevice = $user->device_id;
                // empty($checkdevice)?? User::firstWhere('id', $user->id)->update(['device_id'=> $request->device_id]);
                if ($checkdevice == null) {
                    User::firstWhere('id', $user->id)->update(['device_id' => $request->device_id]);
                }


                return response()->json([
                    'message' => 'successfully login',
                    'token' => $token,
                    'data' => $user
                ]);
            };
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }

        return response()->json([
            'success' => false,
            'code' => 403,
            'message' => 'Opps ! Mobile number or password wrong or Account is not active !'
        ], 403);
    }

    // Logout
    public function logout(Request $request)
    {
        $user = $request->user();
        // Revoke all tokens...
        // $user->tokens()->delete();
        // Revoke a specific token...
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'User Successfully logged out',
        ]);
    }

    public function checkUser(Request $request)
    {
        $request->validate([
            'mobile' => 'required|unique:users',
            'password' => 'required|min:4'
        ], [
            'mobile.unique:users' => 'Mobile number is already taken.'
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Continue for register account',
        ]);
    }
}
