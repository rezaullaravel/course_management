<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

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

        //image upload
        if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/user_images/'),$imageName);
            $imagePath = 'upload/user_images/'.$imageName;
        }


        $user = new User();
        $user->name = $request->name;
        if(!empty($request->name_bn)){
            $user->name_bn = $request->name_bn;
        }
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if(!empty($request->image)){
            $user->image = $imagePath;
        }
        if(!empty($request->teacher_linkedin)){
            $user->teacher_linkedin = $request->teacher_linkedin;
        }
        if(!empty($request->teacher_description)){
            $user->teacher_description = $request->teacher_description;
        }
        if(!empty($request->teacher_description_bn)){
            $user->teacher_description_bn = $request->teacher_description_bn;
        }
        if(!empty($request->teacher_degree_inst)){
            $user->teacher_degree_inst = $request->teacher_degree_inst;
        }
        if(!empty($request->teacher_degree_inst_bn)){
            $user->teacher_degree_inst_bn = $request->teacher_degree_inst_bn;
        }

        if(!empty($request->teacher_degree)){
            $user->teacher_degree = $request->teacher_degree;
        }
        if(!empty($request->teacher_degree_bn)){
            $user->teacher_degree_bn = $request->teacher_degree_bn;
        }

        if(!empty($request->t_degree_subject)){
            $user->t_degree_subject = $request->t_degree_subject;
        }
        if(!empty($request->t_degree_subject_bn)){
            $user->t_degree_subject_bn = $request->t_degree_subject_bn;
        }
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

          //image upload
          if($request->image){
            if(File::exists($user->image)){
                unlink($user->image);
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/user_images/'),$imageName);
            $imagePath = 'upload/user_images/'.$imageName;
        }


        $user->name = $request->name;
        if(!empty($request->name_bn)){
            $user->name_bn = $request->name_bn;
        }
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
         if(!empty($request->image)){
            $user->image = $imagePath;
        }
        if(!empty($request->teacher_linkedin)){
            $user->teacher_linkedin = $request->teacher_linkedin;
        }
        if(!empty($request->teacher_description)){
            $user->teacher_description = $request->teacher_description;
        }
        if(!empty($request->teacher_description_bn)){
            $user->teacher_description_bn = $request->teacher_description_bn;
        }
        if(!empty($request->teacher_degree_inst)){
            $user->teacher_degree_inst = $request->teacher_degree_inst;
        }
        if(!empty($request->teacher_degree_inst_bn)){
            $user->teacher_degree_inst_bn = $request->teacher_degree_inst_bn;
        }

        if(!empty($request->teacher_degree)){
            $user->teacher_degree = $request->teacher_degree;
        }
        if(!empty($request->teacher_degree_bn)){
            $user->teacher_degree_bn = $request->teacher_degree_bn;
        }

        if(!empty($request->t_degree_subject)){
            $user->t_degree_subject = $request->t_degree_subject;
        }
        if(!empty($request->t_degree_subject_bn)){
            $user->t_degree_subject_bn = $request->t_degree_subject_bn;
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
