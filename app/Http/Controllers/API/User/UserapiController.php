<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserapiController extends Controller
{
    public function allNotice()
    {
        // $list = Cache::rememberForever('gifts', function () {
        //     return Notice::orderBy('diamond', 'asc')->get();
        // });
        $notices = Notice::latest()->get();
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $notices
        ]);
    }

    public function singleNotice($id)
    {
        // $list = Cache::rememberForever('gifts', function () {
        //     return Notice::orderBy('diamond', 'asc')->get();
        // });
        $notice = Notice::firstWhere('id',$id);
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $notice
        ]);
    }

    public function notifications(Request $request)
    {
        $notifications = $request->user()->notifications;
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $notifications
        ]);
    }
}
