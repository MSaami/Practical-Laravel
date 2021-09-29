<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();

        return view('users.list', compact('users'));
    }


    public function edit(User $user)
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $user->load('roles', 'permissions');
        return view('users.edit', compact('permissions', 'roles', 'user'));
    }


    public function update(Request $request, User $user)
    {
        $user->refreshPermissions($request->permissions);
        $user->refreshRoles($request->roles);

        return back()->with('success', true);
    }
}
