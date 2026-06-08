<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = User::where('role', '!=', 'admin')->get(); // Admin မဟုတ်သူများ
        $users = \App\Models\User::all();
        return view('backend.user.index', compact('users'));
    }   


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('backend.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        return view('backend.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    // UserController.php
    public function update(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $data = [
            'name' => $request->name,
        ];

        if ($request->filled('email')) {
            $data['email'] = $request->email;
        }

        $user->update($data);

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->hasRole('admin')) { 
            return redirect()->back()->with('error', 'Admin is not Delete!');
        }
        if ($user->orders()->count() > 0) {
        return redirect()->back()->with('error', 'Sorry, this user has existing orders!');
    }
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted!');
    }
}
