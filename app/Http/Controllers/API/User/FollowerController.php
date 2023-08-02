<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(Request $request)
    {
        $request->validate([
            'follower_id' => 'required'
        ]);
        $follow = Follower::where('user_id', $request->user()->id)
            ->where('follower_id', $request->follower_id)
            ->first();

        // return $likecheck;
        if ($follow) {
            return response()->json([
                'message' => 'Already following.'
            ], 422);
        } else {
            $folling = Follower::create([
                'user_id' => $request->user()->id,
                'follower_id' => $request->follower_id
            ]);
            return response()->json([
                'message' => 'Following successfull !',
                'data' => $folling
            ]);
        }
    }

    public function unFollow(Request $request)
    {
        $request->validate([
            'follower_id' => 'required'
        ]);

        $follow = Follower::where('user_id', $request->user()->id)
            ->where('follower_id', $request->follower_id)
            ->first();

        // return $likecheck;
        if ($follow) {
            $follow->delete();
            return response()->json([
                'message' => 'Unfollow successfull.'
            ]);
        } else {
            return response()->json([
                'message' => 'Ops ! Something went wrong'
            ], 422);
        }
    }

    public function followerList(Request $request)
    {
        $followers = Follower::where('follower_id', $request->user()->id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $followers)->withCount('followers')->paginate();

        return response()->json($users);
    }

    public function followwingList(Request $request)
    {
        $following = Follower::where('user_id', $request->user()->id)->pluck('follower_id')->toArray();
        $users = User::whereIn('id', $following)->withCount('followers')->paginate();
        // $user = $request->user;

        return response()->json($users);
    }
}
