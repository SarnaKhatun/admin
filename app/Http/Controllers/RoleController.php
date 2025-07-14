<?php

namespace App\Http\Controllers;

use App\Models\PermissionModule;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('role.list')) {
            $roles = Role::get();
            return view('backend.role-permission.role.index', ['roles' => $roles]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('role.create')) {
            return view('backend.role-permission.role.create');
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
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('roles')->with('success','Role Created Successfully');
    }

    public function edit(Role $role)
    {
        $user = auth()->user();

        if ($role->id == 1) {
            return redirect()->back()->with('error', 'Editing this role is not allowed!');
        }
        if ($user->hasRole('super_admin') || $user->can('role.edit')) {
            return view('backend.role-permission.role.edit', [
                'role' => $role
            ]);
        } else {
            return redirect()->back()->with('error', 'You don’t have permission!');
        }
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('roles')->with('success','Role Updated Successfully');
    }

    public function destroy($roleId)
    {
        $user = auth()->user();
        if ($roleId == 1) {
            return redirect()->back()->with('error', 'Deleting this role is not allowed!');
        }
        if ($user->hasRole('super_admin') || $user->can('role.delete')) {
            $role = Role::find($roleId);
            $role->delete();
            return redirect('roles')->with('success','Role Deleted Successfully');
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function addPermissionToRole($roleId)
    {
        $user = auth()->user();
        if ($roleId == 1) {
            return redirect()->back()->with('error', 'Editing this role is not allowed!');
        }
        if ($user->hasRole('super_admin') || $user->can('role.add/edit-role-permission')) {
            $permissions = Permission::get();
            $role = Role::findOrFail($roleId);
            $modules = PermissionModule::with('permission')->get();
            $rolePermissions = DB::table('role_has_permissions')
                ->where('role_has_permissions.role_id', $role->id)
                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                ->all();

            return view('backend.role-permission.role.add-permissions', [
                'role' => $role,
                'permissions' => $permissions,
                'rolePermissions' => $rolePermissions,
                'modules' => $modules,
            ]);
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect('roles')->with('success','Permissions added to role');
    }
}
