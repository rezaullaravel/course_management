<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //persmission list
    public function index(){
        $permissions = Permission::all();
        return view('admin.permission.index',compact('permissions'));
    }//end method

    //permission create
    public function create(){
        return view('admin.permission.create');
    }//end method

    //permission store
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:permissions,name'
        ]);

         Permission::create(['name' => $request->name]);
         return redirect('/admin/permission/list')->with('message','Permission Created Successfully');
    }//end method

    //permission edit
    public function edit($id){
        $permission = Permission::find($id);
        return view('admin.permission.edit',compact('permission'));
    }//end method

    //permission update
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|unique:permissions,name,'.$id,
        ]);

         
         Permission::find($id)->update(['name' => $request->name]);
         return redirect('/admin/permission/list')->with('message','Permission Updated Successfully');
    }//end method


    //permission delete
    public function delete($id){
        Permission::find($id)->delete();
        return redirect('/admin/permission/list')->with('message','Permission Deleted Successfully');
    }//end method
}
