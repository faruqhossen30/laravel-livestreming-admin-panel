<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Core\Timestamp;

class TransactionadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected $db;
    // function __construct(string $projectId = 'akashliveapp')
    // {
    //     $this->db = new FirestoreClient([
    //         'projectId' => $projectId,
    //     ]);
    // }
    public function index()
    {
        $db = new FirestoreClient([
            'projectId' => 'akashliveapp',
        ]);

        $today = Carbon::today();
        $startOfToday = new Timestamp($today);
        $endOfToday = new Timestamp($today->copy()->addDay());

        $transactionsRef = $db->collection('transactions');
        $query = $transactionsRef->where('createdAt', '>=', $startOfToday)
            ->where('createdAt', '<', $endOfToday)->orderBy('createdAt', 'DESC');
        $snapshot = $query->documents();

        $transactions = [];
        $totalComission = 0;
        foreach ($snapshot as $document) {
            $transactions[] = $document->data();
            $totalComission +=$document->data()['commission'];
        }

        // return $totalComission;
        // return response()->json($trans);
        return view('admin.transaction.index', compact('transactions', 'totalComission'));
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
        Transaction::firstWhere('id', $id)->delete();
        return redirect()->route('transaction.index');
    }
}
