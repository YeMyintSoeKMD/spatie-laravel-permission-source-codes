<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class RoleAndPermissionController extends Controller
{
    # role index
    public function roleIndex()
    {
        $roles = Role::all();
        return view('admin.user.role.index', compact('roles'));
    }

    # permission index
    public function permissionIndex()
    {
        $permissions = Permission::all();
        return view('admin.user.permission.index', compact('permissions'));
    }

    # assign permission index
    public function assignPermissionIndex($roleId)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($roleId);
        return view('admin.user.role.assign-permission',compact('role', 'permissions'));
    }

    # assign permission to role
    public function assignPermission()
    {
        $role = Role::findOrFail(request()->role_id);

        $role->syncPermissions(request()->permission_ids);

        Alert::success('Congrats!', 'You have successfully assigned the permissions.');
        return redirect('admin/roles');
    }

}
