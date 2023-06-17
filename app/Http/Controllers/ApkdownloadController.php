<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class ApkdownloadController extends Controller
{
    public function apkDownload(){
        $filepath = public_path('uploads/apk/akashlive-v-1.0.0.apk');
        return Response::download($filepath);
    }
}
