<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use  Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('user.list')) {
            $users = User::all();
            return view('backend.role-permission.user.index', ['users' => $users]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('user.create')) {
            $roles = Role::pluck('name','name')->all();
            return view('backend.role-permission.user.create', ['roles' => $roles]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|digits:11|numeric|unique:users,phone',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect('/users')->with('success','User created successfully with roles');
    }

    public function edit(User $user)
    {
        $User = auth()->user();
        if ($User->hasRole('super_admin') || $User->can('user.edit')) {
            $roles = Role::pluck('name','name')->all();
            $userRoles = $user->roles->pluck('name','name')->all();
            return view('backend.role-permission.user.edit', [
                'user' => $user,
                'roles' => $roles,
                'userRoles' => $userRoles
            ]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:11|numeric',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];


        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('success','User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = auth()->user();
        if ($userId == 1) {
            return redirect()->back()->with('error', 'Deleting this user is not allowed!');
        }
        if ($user->hasRole('super_admin') || $user->can('user.delete')) {
            $user = User::findOrFail($userId);
            $user->delete();

            return redirect('/users')->with('success','User Delete Successfully');
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }
}
