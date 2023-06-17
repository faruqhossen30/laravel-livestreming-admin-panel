<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class ApkdownloadController extends Controller
{
    public function apkDownload(){
        $filepath = public_path('uploads/apk/some.apk');
        return Response::download($filepath);
    }
}
