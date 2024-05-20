<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        //$users = User::orderBy('id', 'DESC')->paginate(10);
        $users = DB::table('users')
            ->whereIn('role', ['admin', 'user', 'lecturer'])
        ->when($request->input('search'), function($query, $search){
            $query->whereIn('role', ['admin', 'user', 'lecturer'])
                ->whereAny(['email', 'name'], 'LIKE', '%'.$search.'%');
        })->orderBy('id', 'DESC')->paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required',
            'phone' => 'required|min:10|max:17'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        if($user->email != $request->email) {
            $check = User::where('email', $request->email)->first();
            if(!$check) {
                $user->email = $request->email;
            }
        }
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();

        if(!empty($request->password)) {
            if($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        }

        return redirect()->route('user.index')->with(['success' => 'User data change successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
