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
        $liveRef = $db->collection('lives')->document($id);
        $liveRef->delete();
        // $cityRef->update([
        //     [
        //         'path' => 'live',
        //         'value' => false
        //     ],
        //     [
        //         'path' => 'join',
        //         'value' => false
        //     ],
        //     [
        //         'path' => 'channel',
        //         'value' => null
        //     ]
        // ]);

        return redirect()->back();
    }
    public function changePassword(Request $request, $id)
    {

        $request->validate([
            'password' => 'required|min:4'
        ]);

        User::firstWhere('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);

        // return $request->all();
        return redirect()->back()->with('success', 'Tender has been uploaded successfully! ');
    }

    public function deactiveUser(Request $request, $id)
    {

        // $request->validate([
        //     'password' => 'required|min:4'
        // ]);

        $user = User::firstWhere('id', $id);

        $user->update([
            'status' => false,
        ]);
        $user->tokens()->delete();

        $db = app('firebase.firestore')->database();
        $firebaseUser = $db->collection('users')->document($user->id);
        $firebaseUser->update([
            ['path' => 'status', 'value' => false]
        ]);

        $liveRef = $db->collection('lives')->document($id);
        $liveRef->update([
            ['path' => 'status', 'value' => false]
        ]);

        return redirect()->back();
    }
    public function activeUser(Request $request, $id)
    {

        $user = User::firstWhere('id', $id);

        $user->update([
            'status' => true,
        ]);
        $user->tokens()->delete();
        $db = app('firebase.firestore')->database();
        $firebaseUser = $db->collection('users')->document($user->id);
        $firebaseUser->update([
            ['path' => 'status', 'value' => true]
        ]);


        return redirect()->back();
    }
}
