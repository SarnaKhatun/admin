<?php

namespace App\Http\Controllers;

use App\Models\PermissionModule;
use Illuminate\Http\Request;

class PermissionModuleController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('module.list')) {
            $permission_modules = PermissionModule::get();
            return view('backend.role-permission.permission-module.index', ['permission_modules' => $permission_modules]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('module.create')) {
            return view('backend.role-permission.permission-module.create');
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
                'max:255',
                'unique:permission_modules,name'
            ],
        ]);

        PermissionModule::create([
            'name' => $request->name,
        ]);

        return redirect('permission-modules')->with('success','Module Name Created Successfully');
    }

    public function edit(PermissionModule $permissionModule)
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('module.edit')) {
            return view('backend.role-permission.permission-module.edit', ['permissionModule' => $permissionModule]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function update(Request $request, PermissionModule $permissionModule)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ]
        ]);

        $permissionModule->update([
            'name' => $request->name,
        ]);

        return redirect('permission-modules')->with('success','Module Updated Successfully');
    }

    public function destroy($permissionModuleId)
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('module.delete')) {
            $permission_module = PermissionModule::find($permissionModuleId);
            $permission_module->delete();
            return redirect('permission-modules')->with('success','Module Deleted Successfully');
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }
}
