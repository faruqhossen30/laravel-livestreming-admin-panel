<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settingPage()
    {
        return view('admin.settings.setting');
    }

    public function websiteName(Request $request)
    {
        // return $request->all();
        $request->validate([
            'website_title'=>'required'
        ]);

        option(['website_title' => $request->website_title]);

        return redirect()->route('admin.settings');


    }
}
