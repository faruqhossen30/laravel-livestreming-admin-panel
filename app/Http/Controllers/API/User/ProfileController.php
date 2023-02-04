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
        Image::make($imagethumbnail)->save('uploads/avatar/' . $avatarImage);

        $user->update(['avatar' => $avatarImage]);

        return response()->json([
            'message' => 'Profile picture has been changeded !',
            'user' => $request->user()
        ]);
    }


    public function changeNumber(Request $request)
    {
        $user = $request->user();

        if ($user->otp_verified_at) {
            return response()->json([
                'message' => 'Number already veryfied'
            ]);
        }

        $user->update(['mobile' => $request->number]);


        return response()->json([
            'message' => 'Mobile number has been changeded !',
            'user' => $request->user()
        ]);
    }

    public function changeName(Request $request)
    {
        $user = $request->user();
        $request->validate(['name' => 'required']);

        User::firstWhere('id', $user->id)->update(
            ['name' => $request->name, 'name_updated_at'=>Carbon::now()]
        );
        $user = User::firstWhere('id', $user->id);
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
        $request->validate(['password' => 'required', 'new_password' => 'required']);

        // $user = User::firstWhere('id',$user->id);

        $check = Hash::check($request->password, $user->password);
        if ($check) {
            User::firstWhere('id', $user->id)->update(['password' => $request->password]);
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Password update successfully !',
                'user' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'code' => 200,
                'message' => 'Old password not match !'
            ]);
        }
    }
}
