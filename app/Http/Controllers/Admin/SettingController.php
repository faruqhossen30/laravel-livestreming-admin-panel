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
        $request->validate([
            'website_title'=>'required'
        ]);
        option(['website_title' => $request->website_title]);
        return redirect()->route('admin.settings');
    }

    public function daimondCommission(Request $request)
    {
        // return $request->all();
        $request->validate([
            'daimond_commission'=>'required'
        ]);
        option(['daimond_commission' => $request->daimond_commission]);
        return redirect()->route('admin.settings');
    }

    public function daimondRate(Request $request)
    {
        // return $request->all();
        $request->validate([
            'daimond_rate'=>'required'
        ]);
        option(['daimond_rate' => $request->daimond_rate]);
        return redirect()->route('admin.settings');
    }
    public function withdrawRate(Request $request)
    {
        // return $request->all();
        $request->validate([
            'withdraw_rate'=>'required'
        ]);
        option(['withdraw_rate' => $request->withdraw_rate]);
        return redirect()->route('admin.settings');
    }
}
