<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlockUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = trim($_GET['keyword']);
        }

        $users = User::where('is_user', 1)->orderBy('id', 'desc')->get();
        // return view('admin.user.index', compact('users'));
        return view('admin.user.usertable', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['mobile'] = $request->countrycode . $request->number;
        $request->validate([
            'name' => 'required',
            'countrycode' => 'required',
            'mobile' => 'required|unique:users',
            'number' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ];


        $user = User::create($data);
        $firebaseData = [
            'id' => $user->id,
            'uid' =>strval($user->id),
            'name' => $request->name,
            'email' => null,
            'mobile' => $request->mobile,
            'otpVerifiedAt' => null,
            'status' => true,
            'avatar' => null,
            'diamond' => 0,
            'label' => 0,
            'transaction' => 0,
            'balance' => 0,
            'deviceId' => null,
            'appsId' => null,
            'nameUpdatedAt' => null,
            'createdAt' => null,
            'updatedAt' => null
        ];

        $db = app('firebase.firestore')->database();
        $db->collection('users')->document($user->id)->set($firebaseData);

        return redirect()->route('user.index');
        // return $user;
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
        $user = User::firstWhere('id', $id);
        $blockuser = BlockUser::firstWhere('user_id', $id);
        // return gettype($blockuser);
        return view('admin.user.edit', compact('user', 'blockuser'));
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
        User::firstWhere('id', $id)->delete();
        return redirect()->route('user.index');
    }
}
