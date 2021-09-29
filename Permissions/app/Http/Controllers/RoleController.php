<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.list', compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validateForm($request);

        Role::create($request->only('name', 'persian_name'));


        return back()->with('success', true);
    }


    protected function validateForm($request)
    {
        return $request->validate([
            'name' => ['required'],
            'persian_name' => ['required'],
        ]);
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $role->load('permissions');
        return view('roles.edit', compact('permissions', 'role'));
    }


    public function update(Request $request, Role $role)
    {
        $this->validateForm($request);

        $role->update($request->only('name', 'persian_name'));

        $role->refreshPermissions($request->permissions);

        return back()->with('success', true);
    }
}
