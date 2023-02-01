<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ProfileController extends Controller
{
    public function avatar(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'avatar'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        $imagethumbnail = $request->file('avatar');
        $extension = $imagethumbnail->getClientOriginalExtension();
        $avatarImage = Str::uuid() . '.' . $extension;
        Image::make($imagethumbnail)->save('uploads/avatar/' . $avatarImage);

        $user->update(['avatar'=>$avatarImage]);

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

        $user->update(['mobile'=> $request->number]);


        return response()->json([
            'message' => 'Mobile number has been changeded !',
            'user' => $request->user()
        ]);
    }
}
