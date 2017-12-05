<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $request->user()->authorizeRoles('admin');
        $users = User::all();
        return view('roles.index', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function promote(Request $request, User $user)
    {
        //
        $request->user()->authorizeRoles('admin');
        $this->validate(request(), [ 'role' => 'required' ]);
        $role = Role::where('name', request('role'))->first();
        $user->roles()->attach($role);
        return redirect('/roles');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function demote(Request $request, User $user)
    {
        //
        $request->user()->authorizeRoles('admin');
        $this->validate(request(), [ 'role' => 'required' ]);
        $role = Role::where('name', request('role'))->first();
        $user->roles()->detach($role);
        return redirect('/roles');
    }
}
