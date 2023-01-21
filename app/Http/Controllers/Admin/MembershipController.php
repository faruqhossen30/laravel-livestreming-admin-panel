<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::get();
        return view('admin.membership.index', compact('memberships'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ]);

        $icon = null;
        if ($request->file('icon')) {
            // $imagethumbnail = $request->file('icon');
            // $extension = $imagethumbnail->getClientOriginalExtension();
            // $icon = Str::uuid() . '.' . $extension;
            // Image::make($imagethumbnail)->save('uploads/membership/' . $icon);
            return "ase";
        }

        Membership::create([
            'author_id'=>Auth::user()->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'icon'=>$icon,
        ]);

        return redirect()->route('membership.index');
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
        Membership::firstWhere('id',$id)->delete();
        return redirect()->route('membership.index');
    }
}
