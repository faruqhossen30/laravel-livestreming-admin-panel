<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Google\Cloud\Firestore\FieldValue;
use Google\Cloud\Firestore\FieldValue\ServerTimestampValue;
use Illuminate\Http\Request;

class FcmtokenController extends Controller
{
    public function storeFcm(Request $request)
    {
        $user = $request->user();
        $request->validate(['fcmtoken' => 'required']);

        if ($user->name_updated_at) {
            $dt = Carbon::parse($user->name_updated_at);
            $now = Carbon::now();
            $diff = $dt->diffInDays($now);
            if ($diff < 30) {
                $after = 30 - intval($diff);
                return response()->json([
                    'success' => false,
                    'code' => 422,
                    'message' => "Please change your name after {$after} days",
                ], 422);
            }
        }
        User::firstWhere('id', $user->id)->update(
            ['fcm_token' => $request->fcmtoken, 'fcm_time' => Carbon::now()]
        );
        $user = User::firstWhere('id', $user->id);

        $db = app('firebase.firestore')->database();
        $firebaseUser = $db->collection('users')->document($user->id);
        $firebaseUser->update([
            ['path' => 'fcmToken', 'value' => $request->fcmtoken],
            ['path' => 'fcmTime', 'value' => FieldValue::serverTimestamp()]
        ]);
        return response()->json([
            'message' => 'FCM Token save successfully',
            'user' => $user
        ]);
    }
}
