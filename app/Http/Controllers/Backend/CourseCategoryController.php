<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CourseCategoryController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-course-category'), only:['index']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-course-category'), only:['create','store']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-course-category'), only:['edit','update']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-course-category'), only:['delete']),
     ];
     }

    //course list
    public function index(){
        $categories = CourseCategory::orderBy('id','desc')->get();
        return view('admin.course_category.index',compact('categories'));
    }//end method

    //create
    public function create(){
        return view('admin.course_category.create');
    }//end method

    //store
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|unique:course_categories,name'
        ]);

        $category = new CourseCategory;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect('admin/course/category/list')->with('message','Course Category Created Successfully');
    }//end method

    //edit form
    public function edit($id){
        $category = CourseCategory::find($id);
        return view('admin.course_category.edit',compact('category'));
   }//end method

    //update
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|string|unique:course_categories,name,'.$id,
        ]);

        $category = CourseCategory::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect('admin/course/category/list')->with('message','Course Category Updated Successfully');
    }//end method

      //delete
      public function delete($id){
        $category = CourseCategory::find($id);

        //delete related course
        $related_courses = Course::where('course_category_id',$id)->get();
        foreach ($related_courses as $course) {
            if(File::exists($course->image)){
                unlink($course->image);
            }
            $course->delete();
        }
        $category->delete();
        return redirect('admin/course/category/list')->with('message','Course Category Deleted Successfully');

    }//end method
}
