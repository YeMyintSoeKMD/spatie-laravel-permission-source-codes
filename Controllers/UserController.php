<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    # index
    public function index() {
        $users = User::orderBy('id','desc')->paginate(25);
        return view('admin.user.index', compact('users'));
    }

    # create user
    public function create()
    {
        $user = new User;
        $centers = Center::all();
        return view('admin.user.create-edit', compact('user','centers'));
    }

    # insert user
    public function store(Request $request)
    {
        $data = $this->validateUser($request, 'required', '');
        $data['email'] = $request->email . "@kmdservice.com";
        $data['password'] = Hash::make($request->password);
        User::create($data);
        Alert::success('Congrats!', 'You have successfully created an employee.');
        return redirect('admin/users');
    }

     # edit user
     public function edit($userId)
     {
         $user = User::findOrFail($userId);
         $centers = Center::all();
         return view('admin.user.create-edit', compact('user','centers'));
     }

     # update Users
     public function update(Request $request, $id)
     {
        $data = $this->validateUser($request, 'nullable', ',email,'.$id);
        $data['email'] = $request->email . "@kmdservice.com";
        $user = User::findOrFail($id);
        if($request->password == null){
            $data['password'] = $user->password;
         }else {
            $data['password'] = Hash::make($request->password);
         }
        $user->update($data);
        Alert::success('Congrats!', 'You have successfully updated an employee.');
        return redirect('admin/users');
     }

     protected function validateUser($request, $password_validation, $para)
     {
        return $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users'.$para,
            'phone' => 'required',
            'center_id' => 'required',
            'password' => $password_validation.'|min:8',
        ]);
     }


    # assign role index
    public function assignRoleIndex($userId)
    {
        $user = User::findOrFail($userId);
        $roles = Role::all();
        return view('admin.user.assign-role', compact('user', 'roles'));
    }

    # assign role
    public function assignRole()
    {
        $user = User::findOrFail(request()->user_id);

        $user->syncRoles(request()->role_ids);

        Alert::success('Congrats!', 'You have successfully assigned the roles.');
        return redirect('admin/users');
    }

}
