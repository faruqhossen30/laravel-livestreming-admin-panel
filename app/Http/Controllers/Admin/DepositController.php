<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::paginate(25);
        return view('admin.deposit.index', compact('deposits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return $userid;
        // return view('admin.deposit.create');
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
            'diamond'=>'required',
            'user_id'=>'required'
        ]);
        $data = [
            'user_id'=> $request->user_id,
            'author_id'=> Auth::user()->id,
            'admin_deposit'=> true,
            'payment_method'=> $request->payment_method,
            'diamond'=> $request->diamond,
            'from_account'=> $request->from_account,
            'to_account'=> $request->to_account,
            'transaction_id'=> $request->transaction_id,
            'description'=> $request->description,
            'status'=> true,
            'confirm_at'=> Carbon::now(),
        ];

        // return $request->all();
        $deposit = Deposit::create($data);
        return redirect()->back()->with('message', 'Diamond deposit success !');
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
        $deposit = Deposit::firstWhere('id', $id);
        return view('admin.deposit.edit', compact('deposit'));
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
        $deposit = Deposit::firstWhere('id', $id);


        $update = $deposit->update([
            'amount' => $request->amount,
            'status' => true,
        ]);
        // $update = Deposit::firstWhere('id',$id)->update([
        //     'amount'=>$request->amount,
        //     'status'=>true,
        // ]);


        if ($update) {
            User::where('id', $deposit->user_id)->increment('balance', $deposit->amount);
            $user = User::firstWhere('id', $deposit->user_id);

            Transaction::create([
                'user_id' => $deposit->user_id,
                'credit' => $deposit->amount,
                'description' => "Deposit {$deposit->amount} taka comfirmed !",
                'balance' =>  $user->balance,
            ]);
        }


        return redirect()->route('deposit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deposit::firstWhere('id', $id)->delete();
        return redirect()->route('deposit.index');
    }
}
