<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Google\Cloud\Firestore\FieldValue;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Google\Cloud\Core\Timestamp;

class DashboardController extends Controller
{
    public function overview()
    {
        $firestore = Firebase::firestore();
        // Get the specified collection
        $collectionRef = $firestore->database()->collection('users');
        // Get all documents in the collection
        $documents = $collectionRef->documents();
        $users = [];
        $totalDiamond = 0;
        $minusDiamond=0;

        foreach ($documents as $document) {
            $users[] = $document->data();
        }

        foreach ($users as $user) {
            if( $user['diamond'] > 0){
                $totalDiamond +=$user['diamond'];
            }
            if( $user['diamond'] < 0){
                $minusDiamond +=$user['diamond'];
            }
        }
        // Transcrion

        $today = Carbon::today();
        $startOfToday = new Timestamp($today);
        $endOfToday = new Timestamp($today->copy()->addDay());

        $transactionsRef = $firestore->database()->collection('transactions');
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


        return view('overview', compact('totalDiamond', 'minusDiamond','totalComission'));

        // return $totalDiamond;
        // echo 'Diamone = '.$totalDiamond;
        // echo '<br/>';
        // echo 'Minus Diamone = '.$minusDiamond;

        // $query = $collectionRef->where('live', '=', true);
        // $snapshot = $query->documents();
        // foreach ($snapshot as $document) {
        //     echo $document->id();
        //     echo "<br>";
        // }
        // $timestamp = FieldValue::serverTimestamp();

        // $query = $collectionRef->where('createdAt', '==', $timestamp);
        // $snapshot = $query->documents();
        // foreach ($snapshot as $document) {
        //     echo $document->id();
        //     echo "<br>";
        // }

        // return view('overview');
    }
}
