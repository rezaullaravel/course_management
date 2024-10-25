<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
     //role list
    public function index(){
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }//end method

    //role create
    public function create(){
        return view('admin.role.create');
    }//end method

    //role store
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:roles,name'
        ]);

         Role::create(['name' => $request->name]);
         return redirect('/admin/role/list')->with('message','Role Created Successfully');
    }//end method

    //role edit
    public function edit($id){
        $role = Role::find($id);
        return view('admin.role.edit',compact('role'));
    }//end method

    //role update
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|unique:roles,name,'.$id,
        ]);

         
         Role::find($id)->update(['name' => $request->name]);
         return redirect('/admin/role/list')->with('message','Role Updated Successfully');
    }//end method


    //role delete
    public function delete($id){
        Role::find($id)->delete();
        return redirect('/admin/role/list')->with('message','Role Deleted Successfully');
    }//end method
}
