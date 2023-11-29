<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use App\Models\WithdrawSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\FieldValue;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->all();
        $withdraws = Withdraw::where('user_id', $request->user()->id)->paginate(5);
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
            "withdraw_type"       => "required",
            "account"             => "required",
            "diamond"             => "required"
        ]);

        $withdraw_setting = WithdrawSetting::first();
        $diomond_rate = $withdraw_setting->diamond_rate * 1000;
        $withdraw_type= strtolower($request->withdraw_type);

        $withdraw_commission = $withdraw_type == 'normal' ?  $withdraw_setting->normar_widthraw_commission : $withdraw_setting->urgent_widthraw_commission;

        $diamond_commission = $withdraw_type == 'normal' ?  $request->diamond * $withdraw_setting->normar_widthraw_commission/100 : $request->diamond * $withdraw_setting->urgent_widthraw_commission/100;
        $total_diamond = $request->diamond + $diamond_commission;

        $db = new FirestoreClient([
            'projectId' => 'akashliveapp',
        ]);

        $firebaseuser = $db->collection('users')->document($request->user()->id);
        $blance_diamon = $firebaseuser->snapshot()['diamond'];


        if($total_diamond > $blance_diamon){
            return response()->json([
                'message' => 'Sorry ! Insufficent diamond.',
            ]);
        }else{

            $data = [
                "user_id"             => $request->user()->id,
                "withdraw_rate"       => $withdraw_setting->diamond_rate,
                "withdraw_commission" => $withdraw_commission,
                "payment_method"      => $request->payment_method,
                "withdraw_type"       => $request->withdraw_type,
                "account"             => $request->account,
                "diamond"             => $request->diamond,
                "diamond_commission"  => $diamond_commission,
                "total_diamond"       => $total_diamond,
                "amount"              => $withdraw_setting->diamond_rate * $request->diamond,
                "blance_diamond"      => $blance_diamon,
                "time"                => Carbon::now()
            ];


            $withdraw = Withdraw::create($data);
            $db->collection('withdraws')->add($data);
            $firebaseuser->update([
                ['path' => 'diamond', 'value' => FieldValue::increment(-intval($request->diamond))]
            ]);


            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Successfully received your widthdraw request.',
                'data' => $withdraw
            ]);
        }

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
