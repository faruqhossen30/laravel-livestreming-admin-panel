<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserupdateController extends Controller
{
    public function stopLive(Request $request, $id)
    {

        $db = app('firebase.firestore')->database();

        $cityRef = $db->collection('users')->document($id);
        $cityRef->update([
            [
                'path' => 'live',
                'value' => false
            ],
            [
                'path' => 'join',
                'value' => false
            ],
            [
                'path' => 'channel',
                'value' => null
            ]
        ]);

        return redirect()->back();
    }
    public function changePassword(Request $request, $id)
    {

        $request->validate([
            'password'=>'required|min:4'
        ]);

        User::firstWhere('id',$id)->update([
            'password' => Hash::make($request->password),
        ]);

        // return $request->all();
        return redirect()->back()->with('success', 'Tender has been uploaded successfully! ');
    }


}
