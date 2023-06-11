<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AgoraController extends Controller
{
    public function index()
    {
        $agora = Cache::rememberForever('agora', function () {
            return Agora::first();
        });

        return $agora;
    }
    public function appId()
    {
        $agora = Cache::rememberForever('agora', function () {
            return Agora::first();
        });

        return $agora->app_id;
    }
}
