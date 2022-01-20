<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index',[
            'roles' => Role::all(),
            'title' => 'Halaman Role'
        ]);
    }

    public function create()
    {
        return view('roles.create', [
            'permissions' => Permission::get(),
            'title' => 'Buat Role'
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => request('name')]);
        $role->syncPermissions(request('permission'));

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::get(),
            'title' => 'Edit Role',
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permission' => 'required',
        ]);

        $role->update(['name' => request('name')]);
        $role->syncPermissions(request('permission'));

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
