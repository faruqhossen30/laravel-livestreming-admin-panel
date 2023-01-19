<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::get();
        // return $labels;
        return view('admin.label.index',compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.label.create');
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
            'label'=>'required',
            'diamond'=>'required',
        ]);

        Label::create([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'label'=>$request->label,
            'diamond'=>$request->diamond,
        ]);

        return redirect()->route('label.index');

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
        $label = Label::firstWhere('id',$id);
        // return $label;
        return view('admin.label.edit',compact('label'));
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
        $request->validate([
            'label'=>'required',
            'diamond'=>'required',
        ]);

        Label::firstWhere('id',$id)->update([
            'name'=>$request->name,
            'label'=>$request->label,
            'diamond'=>$request->diamond
        ]);

        return redirect()->route('label.index');
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
        Label::firstWhere('id',$id)->delete();
        return redirect()->route('label.index');
    }
}
