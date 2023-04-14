<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LiveuserController extends Controller
{
    public function index()
    {
        $users= User::where('live', 1)->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $users
        ]);

    }
}
