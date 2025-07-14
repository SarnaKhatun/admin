<?php

namespace App\Http\Controllers;

use App\Models\PermissionModule;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('permission.list')) {
            $permissions = Permission::with('module')->get();
            return view('backend.role-permission.permission.index', ['permissions' => $permissions]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('permission.create')) {
            $permission_modules = PermissionModule::all();
            return view('backend.role-permission.permission.create', compact('permission_modules'));
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ],
            'permission_module_id' => 'required|exists:permission_modules,id'
        ]);

        Permission::create([
            'name' => $request->name,
            'permission_module_id'=>$request->permission_module_id,
        ]);

        return redirect('permissions')->with('success','Permission Created Successfully');
    }

    public function edit(Permission $permission)
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('permission.edit')) {
            $permission_modules = PermissionModule::all();
            return view('backend.role-permission.permission.edit', ['permission' => $permission, 'permission_modules'=> $permission_modules]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ],
            'permission_module_id' => ['required','exists:permission_modules,id']
        ]);

        $permission->update([
            'name' => $request->name,
            'permission_module_id'=>$request->permission_module_id,
        ]);

        return redirect('permissions')->with('success','Permission Updated Successfully');
    }

    public function destroy($permissionId)
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('permission.delete')) {
            $permission = Permission::find($permissionId);
            $permission->delete();
            return redirect('permissions')->with('success','Permission Deleted Successfully');
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }
}
