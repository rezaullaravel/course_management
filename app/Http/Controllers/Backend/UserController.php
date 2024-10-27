<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    //for role permission
    public static function middleware(): array
    {
    return [
       
        
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view user'), only:['index']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create user'), only:['create','store']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit user'), only:['edit','update']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete user'), only:['delete']),
    ];
    }
     //user list
     public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }//end method

    //user create
    public function create(){
        $roles = Role::pluck('name','name')->all();
        return view('admin.user.create',compact('roles'));
    }//end method

    //user store
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->assignRole($request->roles);
         
         return redirect('/admin/user/list')->with('message','User Created Successfully');
    }//end method

    //user edit
    public function edit($id){
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.user.edit',compact('user','roles','userRole'));
    }//end method

    //user update
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

         
         
         return redirect('/admin/user/list')->with('message','User Updated Successfully');
    }//end method


    //user delete
    public function delete($id){
        User::find($id)->delete();
        return redirect('/admin/user/list')->with('message','User Deleted Successfully');
    }//end method
}
