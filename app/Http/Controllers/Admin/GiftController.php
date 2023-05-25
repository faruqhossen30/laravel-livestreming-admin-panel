<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::get();
        return view('admin.gift.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gift.create');
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
            'diamond' => 'required',
            'commission' => 'required',
            'img_url' => 'required',
        ]);
        //    return $request->all();
        Gift::create([
            'name' => $request->name,
            'diamond' => $request->diamond,
            'commission' => $request->commission,
            'total' =>$request->diamond + $request->commission,
            'img_url' => $request->img_url,
            'user' => Auth::user()->id,
        ]);
        return redirect()->route('gift.index');
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
        $gift = Gift::firstWhere('id',$id);
        return view('admin.gift.edit', compact('gift'));
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
        $request->validate([
            'diamond' => 'required',
            'commission' => 'required',
            'img_url' => 'required',
        ]);

        Gift::firstWhere('id',$id)->update([
            'name' => $request->name,
            'diamond' => $request->diamond,
            'commission' => $request->commission,
            'total' =>$request->diamond + $request->commission,
            'img_url' => $request->img_url,
        ]);

        return redirect()->route('gift.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gift::firstWhere('id',$id)->delete();
        return redirect()->route('gift.index');
    }
}
