<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Google\Cloud\Firestore\FieldValue;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class DashboardController extends Controller
{
    public function overview()
    {
        $firestore = Firebase::firestore();
        // Get the specified collection
        $collectionRef = $firestore->database()->collection('users');
        $transactionRef = $firestore->database()->collection('transactions');
        // Get all documents in the collection
        $documents = $collectionRef->documents();
        $users = [];
        $totalDiamond = 0;

        foreach ($documents as $document) {
            $users[] = $document->data();
        }

        foreach ($users as $user) {
            $totalDiamond +=$user['diamond'];
        }

        // return $totalDiamond;

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

        return view('overview');
    }
}
