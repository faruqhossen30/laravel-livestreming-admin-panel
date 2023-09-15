<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Follower;
use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
            $notificationReceiver = User::firstWhere('id', $request->follower_id);
            $folling = Follower::create([
                'user_id' => $request->user()->id,
                'follower_id' => $request->follower_id
            ]);
            Notification::send($notificationReceiver, new FollowNotification(
                ["title" => "Follow notification.", "description" => "{$request->user()->name} is now follow you."]
            ));
            return response()->json([
                'message' => 'Following request send success.',
                'data' => $request->user()->notifications
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


    public function followAccept(Request $request)
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
            $notificationReceiver = User::firstWhere('id', $request->follower_id);
            $folling = Follower::create([
                'user_id' => $request->user()->id,
                'follower_id' => $request->follower_id
            ]);
            Notification::send($notificationReceiver, new FollowNotification(['title' => 'Follow request send', 'description' => 'Some user send you message']));
            return response()->json([
                'message' => 'Following request send success.',
                'data' => $request->user()->notifications
            ]);
        }
    }

    public function checkfollower(Request $request)
    {
        $request->validate([
            'follower_id' => 'required'
        ]);
        $follow = Follower::where('user_id', $request->user()->id)
            ->where('follower_id', $request->follower_id)
            ->first();

        $bloc = Block::where('user_id', $request->user()->id)
            ->where('block_id', $request->follower_id)
            ->first();

        return response()->json([
            'message' => 'Checking success !',
            'follow' => $follow ? true : false,
            'pending' => $follow->status ? false : true,
            'block' => $bloc ? true : false

        ]);
    }


    public function followers(Request $request)
    {
        $followers = Follower::where('follower_id', $request->user()->id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $followers)->withCount('followers')->paginate();

        return response()->json($users);
    }
    public function followings(Request $request)
    {
        $followers = Follower::where('user_id', $request->user()->id)->pluck('follower_id')->toArray();
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
