<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheflushController extends Controller
{
    public function giftApiFlush() {
        Cache::forget('gifts');
        return redirect()->back();
    }
}
