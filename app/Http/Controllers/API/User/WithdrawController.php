<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $withdraws = Withdraw::where('user_id',$request->user()->id)->paginate(5);
        return response()->json($withdraws);
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
        $request->validate([
            "withdraw_rate"        => "required",
            "withdraw_commission" => "required",
            "payment_method"      => "required",
            "withdraw_type"       => "required",
            "account"             => "required",
            "diamond"             => "required",
            "diamond_commission"  => "required",
            "total_diamond"       => "required"
        ]);

        $data = [
            "user_id"             => $request->user()->id,
            "withdraw_rate"       => $request->withdraw_rate,
            "withdraw_commission" => $request->withdraw_commission,
            "payment_method"      => $request->payment_method,
            "withdraw_type"       => $request->withdraw_type,
            "account"             => $request->account,
            "diamond"             => $request->diamond,
            "diamond_commission"  => $request->diamond_commission,
            "total_diamond"       => $request->total_diamond
        ];

        $withdraw = Withdraw::create($data);
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $withdraw
        ]);
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
}
