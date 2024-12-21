<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CategoryController extends Controller implements HasMiddleware
{
    //for role permission
    public static function middleware(): array
    {
    return [


        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-category'), only:['index']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-category'), only:['create','store']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-category'), only:['edit','update']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-category'), only:['delete']),
    ];
    }

    //blog category list
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.category.index',compact('categories'));
    }//end method

    //blog category create
    public function create(){
         return view('admin.category.create');
    }//end method

    //store
    public function store(Request $request){
        $request->validate([
            'name_en'=>'required|string|unique:categories',
            'name_bn'=>'required|string|unique:categories'
        ],[
            'name_en.required'=>'The category name english filed is required.',
            'name_bn.required'=>'The category name bangla filed is required.',
        ]);

        $category = new Category;
        $category->name_en = $request->name_en;
        $category->name_bn = $request->name_bn;
        $category->slug = Str::slug($request->name_en);
        $category->save();
        return redirect('admin/category/list')->with('message','Category Created Successfully');
    }//end method

    //edit form
     public function edit($id){
         $category = Category::find($id);
         return view('admin.category.edit',compact('category'));
    }//end method

    //update
    public function update(Request $request,$id){
        $request->validate([
            'name_en'=>'required|string|unique:categories,name_en,'.$id,
            'name_bn'=>'required|string|unique:categories,name_bn,'.$id
        ],[
            'name_en.required'=>'The category name english filed is required.',
            'name_bn.required'=>'The category name bangla filed is required.',
        ]);

        $category = Category::find($id);
        $category->name_en = $request->name_en;
        $category->name_bn = $request->name_bn;
        $category->slug = Str::slug($request->name_en);
        $category->save();
        return redirect('admin/category/list')->with('message','Category Updated Successfully');
    }//end method

    //delete
    public function delete($id){
        $category = Category::find($id);

        //delete related blog
        $related_blogs = Blog::where('blog_category_id',$id)->get();
        if(count($related_blogs)>0){
            foreach ($related_blogs as $blog) {
                if(File::exists($blog->image)){
                    unlink($blog->image);
                }
                $blog->delete();
            }
        }


        //deleted related course
        $related_courses = Course::where('course_category_id',$id)->get();
        if(count($related_courses)>0){
            foreach ($related_courses as $course) {
                if(File::exists($course->image)){
                    unlink($course->image);
                }
                $course->delete();
            }
        }


        $category->delete();
        return redirect('admin/category/list')->with('message','Category Deleted Successfully');

    }//end method
}
