<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FieldValue;

class VipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
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
    public function addVip(Request $request, $id)
    {
        $request->validate([
            'vip' => 'required'
        ]);

        User::firstWhere('id', $id)->update([
            'vip' => $request->vip,
            'vip_date'=> Carbon::now()
        ]);

        $db = app('firebase.firestore')->database();
        $firebaseUser = $db->collection('users')->document($id);
        $firebaseUser->update([
            ['path' => 'vip', 'value' => $request->vip],
            ['path' => 'vipDate', 'value' =>  FieldValue::serverTimestamp()],
        ]);
        // return $request->all();
        return redirect()->back()->with('message', 'User VIP/VVIP update successfully! ');


    }

    public function disableVip(Request $request, $id)
    {

        User::firstWhere('id', $id)->update([
            'vip' => null,
            'vip_date'=> Carbon::now()
        ]);

        $db = app('firebase.firestore')->database();
        $firebaseUser = $db->collection('users')->document($id);
        $firebaseUser->update([
            ['path' => 'vip', 'value' => null],
            ['path' => 'vipDate', 'value' =>  FieldValue::serverTimestamp()],
        ]);
        // return $request->all();
        return redirect()->back()->with('message', 'Deactive VIP/VVIP disable successfully! ');


    }
}
