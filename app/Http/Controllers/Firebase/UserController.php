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
        $users = [];
        $count = 0;

        foreach ($documents as $document) {
            $users[] = $document->data();
        }

        // foreach ($users as $user) {
        //     $count +=$user['diamond'];
        // }

        // return $count;

        return view('admin.user.firebaseusers', compact('users'));
    }
}
