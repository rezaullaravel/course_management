<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BlogCategoryController extends Controller implements HasMiddleware
{
    //for role permission
    public static function middleware(): array
    {
    return [
       
        
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-blog-category'), only:['index']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-blog-category'), only:['create','store']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-blog-category'), only:['edit','update']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-blog-category'), only:['delete']),
    ];
    }

    //blog category list
    public function index(){
        $categories = BlogCategory::orderBy('id','desc')->get();
        return view('admin.blog_category.index',compact('categories'));
    }//end method

    //blog category create
    public function create(){
         return view('admin.blog_category.create');
    }//end method

    //store
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|unique:blog_categories,name'
        ]);

        $category = new BlogCategory;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect('admin/blog/category/list')->with('message','Blog Category Created Successfully');
    }//end method

    //edit form
     public function edit($id){
         $category = BlogCategory::find($id);
         return view('admin.blog_category.edit',compact('category'));
    }//end method

    //update
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|string|unique:blog_categories,name,'.$id,
        ]);

        $category = BlogCategory::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect('admin/blog/category/list')->with('message','Blog Category Updated Successfully');
    }//end method

    //delete
    public function delete($id){
        $category = BlogCategory::find($id);

        //delete related blog
        $related_blogs = Blog::where('blog_category_id',$id)->get();
        foreach ($related_blogs as $blog) {
            if(File::exists($blog->image)){
                unlink($blog->image);
            }
            $blog->delete();
        }
        $category->delete();
        return redirect('admin/blog/category/list')->with('message','Blog Category Deleted Successfully');
         
    }//end method
}
