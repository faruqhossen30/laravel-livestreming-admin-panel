<?php

namespace App\Http\Controllers;

use Google\Cloud\Firestore\FirestoreClient;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class TestController extends Controller
{

    // function __construct(string $projectId = 'cblive-b8448')
    // {
    //     // Create the Cloud Firestore client
    //     if (empty($projectId)) {
    //         // The `projectId` parameter is optional and represents which project the
    //         // client will act on behalf of. If not supplied, the client falls back to
    //         // the default project inferred from the environment.
    //         $db = new FirestoreClient();
    //         printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);
    //     } else {
    //         $db = new FirestoreClient([
    //             'projectId' => $projectId,
    //         ]);
    //         printf('Created Cloud Firestore client with project ID: %s' . PHP_EOL, $projectId);
    //     }
    // }

    public function index()
    {

        // $stuRef = app('firebase.firestore')->database()->collection('students');
        // $stuRef->newDocument()->set([
        //     'name' => 'kamal mia',
        //     'age' => 33
        // ]);

        // return 'firebase';

        // $data = app('firebase.firestore')
        //         ->database()
        //         ->collection('students')
        //         ->document('acbf3788a52848d98c0c')
        //         ->snapshot();

        $data = app('firebase.firestore')
            ->database()
            ->collection('students')->get();

        dd($data);
    }

    public function two()
    {
        $firestore = Firebase::firestore();

        // Get the specified collection
        $collectionRef = $firestore->database()->collection('transactions');

        // Get all documents in the collection
        $documents = $collectionRef->documents();

        $transactions = [];

        foreach ($documents as $document) {
            $transactions[] = $document->data();
        }

        $totalDiamond = 0;


        foreach ($transactions as $user) {
            $totalDiamond +=$user['commission'];
        }

        return $totalDiamond;


    }

    public function showCollectionsAndDocuments()
    {
        $firestore = Firebase::firestore();

        // Get the specified collection
        $collectionRef = $firestore->database()->collection('users');

        // Get all documents in the collection
        $documents = $collectionRef->documents();

        $users = [];

        foreach ($documents as $document) {
            $documentData = [
                'id' => $document->id(),
                'data' => $document->data(),
            ];

            $users[] = $document->data();
        }

        // return response()->json($users);
        // return $users;
        return view('test', compact('users'));
    }

    public function updateUser()
    {
        $db = app('firebase.firestore')->database();

        $cityRef = $db->collection('students')->document('acbf3788a52848d98c0c');
        $cityRef->update([
            ['path' => 'name', 'value' => "welcome"]
        ]);
    }
}
