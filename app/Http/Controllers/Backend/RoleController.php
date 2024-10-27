<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{

    //for role permission
    public static function middleware(): array
    {
    return [
       
        
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view role'), only:['index']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create role'), only:['create','store']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit role'), only:['edit','update']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete role'), only:['delete']),
    ];
    }

     //role list
    public function index(){
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }//end method

    //role create
    public function create(){
        $permissions = Permission::get();
        return view('admin.role.create',compact('permissions'));
    }//end method

    //role store
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:roles,name',
            'permissions' => 'required'
        ]);

         $role = Role::create(['name' => $request->name]);

         if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }
         return redirect('/admin/role/list')->with('message','Role Created Successfully');
    }//end method

    //role edit
    public function edit($id){
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('admin.role.edit',compact('role','permissions','rolePermissions'));
    }//end method

    //role update
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|unique:roles,name,'.$id,
             'permissions' => 'required'
        ]);

         
        $role = Role::find($id);  
        $role->update(['name' => $request->name]);

         if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }
         return redirect('/admin/role/list')->with('message','Role Updated Successfully');
    }//end method


    //role delete
    public function delete($id){
        Role::find($id)->delete();
        return redirect('/admin/role/list')->with('message','Role Deleted Successfully');
    }//end method
}
