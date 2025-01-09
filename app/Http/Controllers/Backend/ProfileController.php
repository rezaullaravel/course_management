<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProfileController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('setting.profile'), only:['profileView','profileUpdate']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('setting.password'), only:['passwordChange','passwordUpdate']),

     ];
     }

     public function profileView(){
        $user = Auth::user();
        return view('admin.profile.profile_view',compact('user'));
     }//end method

     public function profileUpdate(Request $request,$id){
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
      return redirect()->back()->with('message','Profile Updated Successfully');

     }//end method

    //  public function passwordChange(){
    //     return 'pass';
    //  }
}
