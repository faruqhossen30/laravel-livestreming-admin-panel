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

        return $request->user();
    }
}
