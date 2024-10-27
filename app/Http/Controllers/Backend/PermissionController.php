<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{
    //for laravel 10 and older version
    // function __construct()
    // {
    //      $this->middleware('permission:view permission', ['only' => ['index']]);
    //      $this->middleware('permission:create permission', ['only' => ['create','store']]);
    //      $this->middleware('permission:edit permission', ['only' => ['edit','update']]);
    //      $this->middleware('permission:delete permission', ['only' => ['delete']]);
    // }

    public static function middleware(): array
    {
    return [
       
        
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view permission'), only:['index']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create permission'), only:['create','store']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit permission'), only:['edit','update']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete permission'), only:['delete']),
    ];
    }

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
