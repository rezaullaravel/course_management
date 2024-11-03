<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller implements HasMiddleware
{
    //for role permission
    public static function middleware(): array
    {
    return [


        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-blog'), only:['index']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-blog'), only:['create','store']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-blog'), only:['edit','update']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-blog-status'), only:['deactiveBlog','activeBlog']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-blog'), only:['delete']),
    ];
    }

    //blog list
    public function index(){
        if(Auth::user()->hasRole('admin')){
            $blogs = Blog::orderBy('id','desc')->get();
        } else {
            $blogs = Blog::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        }

        return view('admin.blog.index',compact('blogs'));
    }//end method

    //create
    public function create(){
        $categories = BlogCategory::get();
        return view('admin.blog.create',compact('categories'));
    }//end method

    //store
    public function store(Request $request){

         $request->validate([
            'blog_category_id' =>'required',
            'title' => 'required|unique:blogs,title',
            'content' => 'required',
            'image' => 'required|image',
        ],[
            'blog_category_id.required'=>'The category field is required',
            'image.image'=>'The file must be an image'
        ]);

        //image upload
        if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/blog_images/'),$imageName);
            $imagePath = 'upload/blog_images/'.$imageName;
        }

        $blog = new Blog();
        $blog->blog_category_id = $request->blog_category_id;
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->content = $request->content;
        $blog->image = $imagePath;
        $blog->author = Auth::user()->name;
        $blog->save();
        return redirect('admin/blog/post/list')->with('message','Blog  Created Successfully');
    }//end method

    //edit
    public function edit($id){
        $categories = BlogCategory::get();
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('categories','blog'));
    }//end method

     //update
    public function update(Request $request,$id){
         $request->validate([
            'blog_category_id' =>'required',
            'title' => 'required|unique:blogs,title,'.$id,
            'content' => 'required',
            'image' => 'image',
        ],[
            'blog_category_id.required'=>'The category field is required',
            'image.image'=>'The file must be an image'
        ]);

        $blog = Blog::find($id);
        //image upload
        if($request->image){
              if(File::exists($blog->image)){
                unlink($blog->image);
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/blog_images/'),$imageName);
            $imagePath = 'upload/blog_images/'.$imageName;
        }

        $blog->blog_category_id = $request->blog_category_id;
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->content = $request->content;
        if($request->image){
            $blog->image = $imagePath;
        }
        $blog->author = Auth::user()->name;
        $blog->save();
        return redirect('admin/blog/post/list')->with('message','Blog  Updated Successfully');
    }//end method

    //delete
    public function delete($id){
        $blog = Blog::find($id);
        if(File::exists($blog->image)){
                unlink($blog->image);
            }
        $blog->delete();
        return redirect('admin/blog/post/list')->with('message','Blog  Deleted Successfully');
    }//end method


    //deactive blog
    public function deactiveBlog($id){
        $blog = Blog::find($id);
        $blog->status = 0;
        $blog->save();
        return redirect('admin/blog/post/list')->with('message','Blog  Deactive Successfully');
    }//end method


    //active blog
    public function activeBlog($id){
        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->save();
        return redirect('admin/blog/post/list')->with('message','Blog  Active Successfully');
    }//end method


    //ck editor image upload and update
    public function uploadCkeditor(Request $request){
        // Check if there is a file in the request
        if($request->hasFile('upload')){
            // Get the old image URL from the request if available
            $oldImageUrl = $request->input('oldImage');

            // Delete the old image if it exists
            if ($oldImageUrl && file_exists(public_path($oldImageUrl))) {
                unlink(public_path($oldImageUrl));
            }

            // Upload the new image
            $image = $request->file('upload');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/ckeditor_images/'), $imgName);
            $url = url('upload/ckeditor_images/' . $imgName); // Generate the full URL

            return response()->json([
                'url' => $url, // Provide the URL to the uploaded image
                'uploaded' => true // Indicate successful upload
            ]);
        }
    }

}
