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
        User::firstWhere('id', $user->id)->update(
            ['fcm_token' => $request->fcmtoken, 'fcm_time' => Carbon::now()]
        );
        // $user = User::firstWhere('id', $user->id);

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
