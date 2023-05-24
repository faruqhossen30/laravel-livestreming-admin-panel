<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return 'index';
    }

    public function giftSend(Request $request)
    {
        $request->validate([
            'receiver' => 'required',
            'diamond' => 'required',
            'commission' => 'required',
            'total' => 'required',
        ]);

        if ($request->total < $request->user()->diamond) {
            $transction = Transaction::create([
                'sender' => $request->user()->id,
                'receiver' => $request->receiver,
                'diamond' => $request->diamond,
                'commission' => $request->commission,
                'total' => $request->total
            ]);

            if ($transction) {
                $request->user()->decrement('diamond', $request->total);
                User::firstWhere('id', $request->receiver)->increment('diamond', $request->diamond);
            }

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Gift send successfully done'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'code' => 200,
                'message' => 'Insufficent gift balance'
            ]);
        }
    }
}
