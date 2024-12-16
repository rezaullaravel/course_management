<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CourseController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-course'), only:['index']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-course'), only:['create','store']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-course'), only:['edit','update']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-course-status'), only:['deactiveCourse','activeCourse']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-course'), only:['delete']),
     ];
     }

     //course list
     public function index(){
         if(Auth::user()->hasRole('admin')){
             $courses = Course::orderBy('id','desc')->get();
         } else {
             $courses = Course::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
         }

         return view('admin.course.index',compact('courses'));
     }//end method

     //create
     public function create(){
        $categories = Category::all();
        return view('admin.course.create',compact('categories'));

     }//end method


     //store
     public function store(Request $request){
        $request->validate([
            'course_category_id' =>'required',
            'title' => 'required|unique:courses,title',
            'content' => 'required',
            'image' => 'required|image',
        ],[
            'course_category_id.required'=>'The category field is required',
            'image.image'=>'The file must be an image'
        ]);

         //image upload
         if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/course_images/'),$imageName);
            $imagePath = 'upload/course_images/'.$imageName;
        }

        $course = new Course();
        $course->course_category_id = $request->course_category_id;
        $course->user_id = Auth::user()->id;
        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->content = $request->content;
        $course->image = $imagePath;
        $course->video_url = $request->video_url;
        $course->save();
        return redirect('admin/course/post/list')->with('message','Course  Created Successfully');
     }//end method


     //edit
     public function edit($id){
        $categories = Category::all();
        $course = Course::find($id);
        return view('admin.course.edit',compact('categories','course'));
     }//end method

     //update
     public function update(Request $request,$id){
        $request->validate([
            'course_category_id' =>'required',
            'title' => 'required|unique:courses,title,'.$id,
            'content' => 'required',
            'image' => 'image',
        ],[
            'course_category_id.required'=>'The category field is required',
            'image.image'=>'The file must be an image'
        ]);

        $course = Course::find($id);
         //image upload
         if($request->image){
            if(File::exists($course->image)){
                unlink($course->image);
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/course_images/'),$imageName);
            $imagePath = 'upload/course_images/'.$imageName;
        }

        $course->course_category_id = $request->course_category_id;
        $course->user_id = Auth::user()->id;
        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->content = $request->content;
        if($request->image){
        $course->image = $imagePath;
        }
        $course->video_url = $request->video_url;
        $course->save();
        return redirect('admin/course/post/list')->with('message','Course  Updated Successfully');
     }//end method

     //delete
     public function delete($id){
        $course = Course::find($id);

        if(File::exists($course->image)){
            unlink($course->image);
        }
        $course->delete();
        return redirect('admin/course/post/list')->with('message','Course  Deleted Successfully');
     }//end method

     //deactive course
     public function deactiveCourse($id){
        $course = Course::find($id);
        $course->status = 0;
        $course->save();
        return redirect('admin/course/post/list')->with('message','Course  Deactive Successfully');
     }//end method

     //active course
     public function activeCourse($id){
        $course = Course::find($id);
        $course->status = 1;
        $course->save();
        return redirect('admin/course/post/list')->with('message','Course  Active Successfully');
     }//end method
}
