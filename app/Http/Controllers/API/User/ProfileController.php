<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

class ProfileController extends Controller
{
    public function avatar(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        $imagethumbnail = $request->file('avatar');
        $extension = $imagethumbnail->getClientOriginalExtension();
        $avatarImage = Str::uuid() . '.' . $extension;
        $imagethumbnail->move(public_path('uploads/avatar/'), $avatarImage);

        $user->update(['avatar' => $avatarImage]);

        $db = app('firebase.firestore')->database();
        $firebaseUser = $db->collection('users')->document($user->id);
        $firebaseUser->update([
            ['path' => 'avatar', 'value' => $avatarImage]
        ]);

        return response()->json([
            'message' => 'Profile picture has been changeded !',
            'user' => $request->user()
        ]);
    }


    public function changeName(Request $request)
    {
        $user = $request->user();
        $request->validate(['name' => 'required']);

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
            ['name' => $request->name, 'name_updated_at' => Carbon::now()]
        );
        $user = User::firstWhere('id', $user->id);

        $db = app('firebase.firestore')->database();
        $firebaseUser = $db->collection('users')->document($user->id);
        $firebaseUser->update([
            ['path' => 'name', 'value' => $request->name]
        ]);
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Name update successfully !',
            'user' => $user
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();
        $request->validate(['password' => 'required|min:4']);

        User::firstWhere('id', $user->id)->update(['password' => Hash::make($request->password)]);
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Password update successfully !',
                'user' => $user
            ]);
    }

}
