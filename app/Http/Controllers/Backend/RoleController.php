<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('backend.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles,name']);
        
        $role = Role::create(['name' => $request->name]);
        if ($request->has('permission')) {
            $role->syncPermissions($request->permission);
        }

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        return view('backend.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findById($id);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permission);

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        Role::findById($id)->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}