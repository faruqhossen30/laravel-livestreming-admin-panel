<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WithdrawSetting;
use Illuminate\Http\Request;

class WithdrawsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdrawsetting = WithdrawSetting::first();
        return view('admin.withdrawsetting.index', compact('withdrawsetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'diamond_rate' => 'required',
            'normar_widthraw_commission' => 'required',
            'urgent_widthraw_commission' => 'required',
            'description' => 'required'
        ]);

        WithdrawSetting::updateOrCreate(['id' => 1], [
            'status' => $request->status,
            'diamond_rate' => $request->diamond_rate,
            'normar_widthraw_commission' => $request->normar_widthraw_commission,
            'urgent_widthraw_commission' => $request->urgent_widthraw_commission,
            'description' => $request->description
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $withdrawsetting = WithdrawSetting::first();
        return view('admin.withdrawsetting.edit', compact('withdrawsetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
