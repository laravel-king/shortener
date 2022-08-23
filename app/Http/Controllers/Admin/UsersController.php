<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        if (Gate::denies('view-users')){
            return redirect()->route('link.index');
        }
        $users = User::query()->paginate(10);

        return view('Admin.Users.index', compact('users'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('Admin.Users.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|max:250',
            'password' => 'sometimes|nullable|min:6|max:100'
        ]);


        $user_update = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (!empty($request->password))
            $user_update['password'] = Hash::make($request['password']);

        $user->update($user_update);

        return redirect()->route('users.index');
    }


    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('users.index');
    }
}
