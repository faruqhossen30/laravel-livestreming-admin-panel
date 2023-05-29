<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diposits = Deposit::where('user_id', $request->user()->id)->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $diposits
        ]);
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
        // return $request->all();
        $request->validate([
            'method'=> 'required',
            'amount'=> 'required',
            'from_account'=> 'required',
            'to_account'=> 'required',
            'transaction_id'=> 'required',
        ]);

        $data = [
            'user_id'=> $request->user()->id,
            'method'=> $request->method,
            'amount'=> $request->amount,
            'from_account'=> $request->from_account,
            'to_account'=> $request->to_account,
            'transaction_id'=> $request->transaction_id
        ];


        $diposit = Deposit::create($data);

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $diposit
        ]);



        //
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
