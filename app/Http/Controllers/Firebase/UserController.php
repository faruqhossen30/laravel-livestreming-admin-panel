<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class UserController extends Controller
{
    public function userList()
    {
        $firestore = Firebase::firestore();

        // Get the specified collection
        $collectionRef = $firestore->database()->collection('users');

        // Get all documents in the collection
        $documents = $collectionRef->documents();

        $collectionData = [];

        foreach ($documents as $document) {
            $documentData = [
                'id' => $document->id(),
                'data' => $document->data(),
            ];

            $collectionData[] = $documentData;
        }

        $users = $collectionData;

        // return response()->json($collectionData);
        return view('admin.user.userlist', compact('users'));
    }
}
