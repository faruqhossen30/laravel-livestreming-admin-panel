<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\FieldValue;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraws = Withdraw::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.withdraw.index', compact('withdraws'));
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
        $withdraw = Withdraw::firstWhere('id', $id);
        return view('admin.withdraw.show', compact('withdraw'));
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
        $request->validate([
            "status" => 'required'
        ]);
        // return $request->all();

        $withdraw = Withdraw::firstWhere('id', $id);

        if ($request->status == 'complete') {
            $withdraw = Withdraw::firstWhere('id', $id)->update(
                [
                    "status" => $request->status,
                    "note" => $request->note,
                    "time" => Carbon::now(),
                    "author_id" => Auth::user()->id,
                ]
            );
        } else if ($request->status == 'cancle') {

            $db = new FirestoreClient([
                'projectId' => 'akashliveapp',
            ]);

            $firebaseuser = $db->collection('users')->document($withdraw->user_id);
            $firebaseuser->update([
                ['path' => 'diamond', 'value' => FieldValue::increment(intval($withdraw->total_diamond))]
            ]);
            $withdraw = Withdraw::firstWhere('id', $id)->update([
                "status" => $request->status,
                "note" => $request->note,
                "time" => Carbon::now(),
                "author_id" => Auth::user()->id,
            ]);
        }


        return redirect()->route('withdraw.index');
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
