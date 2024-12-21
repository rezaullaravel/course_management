<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Blog;
use App\Models\Category;
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
        $categories = Category::get();
        return view('admin.blog.create',compact('categories'));
    }//end method

    //store
    public function store(Request $request){

         $request->validate([
            'blog_category_id' =>'required',
            'title_en' => 'required|unique:blogs',
            'title_bn' => 'required|unique:blogs',
            'content_en' => 'required',
            'content_bn' => 'required',
            'image' => 'required|image',
        ],[
            'blog_category_id.required'=>'The category field is required',
            'title_en.required'=>'The title english field is required',
            'title_bn.required'=>'The title bangla field is required',
            'content_en.required'=>'The content english field is required',
            'content_bn.required'=>'The content bangla field is required',
            'image.image'=>'The file must be an image'
        ]);

        //image upload
        if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/blog_images/'),$imageName);
            $imagePath = 'upload/blog_images/'.$imageName;
        }

        //image2 upload
        if($request->image2){
            $image2 = $request->image2;
            $imageName2 = rand().'.'.$image2->getClientOriginalName();
            $image2->move(public_path('upload/blog_images/'),$imageName2);
            $imagePath2 = 'upload/blog_images/'.$imageName2;
        }

        //image3 upload
        if($request->image3){
            $image3 = $request->image3;
            $imageName3 = rand().'.'.$image3->getClientOriginalName();
            $image3->move(public_path('upload/blog_images/'),$imageName3);
            $imagePath3 = 'upload/blog_images/'.$imageName3;
        }

        $blog = new Blog();
        $blog->blog_category_id = $request->blog_category_id;
        $blog->user_id = Auth::user()->id;
        $blog->title_en = $request->title_en;
        $blog->title_bn = $request->title_bn;
        $blog->slug = Str::slug($request->title_en);
        $blog->image = $imagePath;
        $blog->content_en = $request->content_en;
        $blog->content_bn = $request->content_bn;
        if(!empty($request->image2)){
            $blog->image2 = $imagePath2;
        }
        if(!empty($request->video_url)){
            $blog->video_url = $request->video_url;
        }
        if(!empty($request->title2_en)){
            $blog->title2_en = $request->title2_en;
        }
        if(!empty($request->title2_bn)){
            $blog->title2_bn = $request->title2_bn;
        }
        if(!empty($request->content2_en)){
            $blog->content2_en = $request->content2_en;
        }
        if(!empty($request->content2_bn)){
            $blog->content2_bn = $request->content2_bn;
        }
        if(!empty($request->topic1_en)){
            $blog->topic1_en = $request->topic1_en;
        }
        if(!empty($request->topic1_bn)){
            $blog->topic1_bn = $request->topic1_bn;
        }
        if(!empty($request->topic2_en)){
            $blog->topic2_en = $request->topic2_en;
        }
        if(!empty($request->topic2_bn)){
            $blog->topic2_bn = $request->topic2_bn;
        }
        if(!empty($request->topic3_en)){
            $blog->topic3_en = $request->topic3_en;
        }
        if(!empty($request->topic3_bn)){
            $blog->topic3_bn = $request->topic3_bn;
        }
        if(!empty($request->topic4_en)){
            $blog->topic4_en = $request->topic4_en;
        }
        if(!empty($request->topic4_bn)){
            $blog->topic4_bn = $request->topic4_bn;
        }
        if (!empty($request->topic5_en)) {
            $blog->topic5_en = $request->topic5_en;
        }
        if (!empty($request->topic5_bn)) {
            $blog->topic5_bn = $request->topic5_bn;
        }
        if (!empty($request->topic6_en)) {
            $blog->topic6_en = $request->topic6_en;
        }
        if (!empty($request->topic6_bn)) {
            $blog->topic6_bn = $request->topic6_bn;
        }
        if (!empty($request->topic7_en)) {
            $blog->topic7_en = $request->topic7_en;
        }
        if (!empty($request->topic7_bn)) {
            $blog->topic7_bn = $request->topic7_bn;
        }
        if (!empty($request->topic8_en)) {
            $blog->topic8_en = $request->topic8_en;
        }
        if (!empty($request->topic8_bn)) {
            $blog->topic8_bn = $request->topic8_bn;
        }
        if (!empty($request->topic9_en)) {
            $blog->topic9_en = $request->topic9_en;
        }
        if (!empty($request->topic9_bn)) {
            $blog->topic9_bn = $request->topic9_bn;
        }
        if (!empty($request->topic10_en)) {
            $blog->topic10_en = $request->topic10_en;
        }
        if (!empty($request->topic10_bn)) {
            $blog->topic10_bn = $request->topic10_bn;
        }
        if(!empty($request->image3)){
            $blog->image3 = $imagePath3 ;
        }
        if(!empty($request->title3_en)){
            $blog->title3_en = $request->title3_en;
        }
        if(!empty($request->title3_bn)){
            $blog->title3_bn = $request->title3_bn;
        }
        if(!empty($request->content3_en)){
            $blog->content3_en = $request->content3_en;
        }
        if(!empty($request->content3_bn)){
            $blog->content3_bn = $request->content3_bn;
        }
        if(!empty($request->footer_topic1_en)){
            $blog->footer_topic1_en = $request->footer_topic1_en;
        }
        if(!empty($request->footer_topic1_bn)){
            $blog->footer_topic1_bn = $request->footer_topic1_bn;
        }
        if(!empty($request->footer_topic2_en)){
            $blog->footer_topic2_en = $request->footer_topic2_en;
        }
        if(!empty($request->footer_topic2_bn)){
            $blog->footer_topic2_bn = $request->footer_topic2_bn;
        }
        if(!empty($request->footer_topic3_en)){
            $blog->footer_topic3_en = $request->footer_topic3_en;
        }
        if(!empty($request->footer_topic3_bn)){
            $blog->footer_topic3_bn = $request->footer_topic3_bn;
        }
        if (!empty($request->footer_topic4_en)) {
            $blog->footer_topic4_en = $request->footer_topic4_en;
        }
        if (!empty($request->footer_topic4_bn)) {
            $blog->footer_topic4_bn = $request->footer_topic4_bn;
        }
        if (!empty($request->footer_topic5_en)) {
            $blog->footer_topic5_en = $request->footer_topic5_en;
        }
        if (!empty($request->footer_topic5_bn)) {
            $blog->footer_topic5_bn = $request->footer_topic5_bn;
        }
        if (!empty($request->footer_topic6_en)) {
            $blog->footer_topic6_en = $request->footer_topic6_en;
        }
        if (!empty($request->footer_topic6_bn)) {
            $blog->footer_topic6_bn = $request->footer_topic6_bn;
        }
        if (!empty($request->footer_topic7_en)) {
            $blog->footer_topic7_en = $request->footer_topic7_en;
        }
        if (!empty($request->footer_topic7_bn)) {
            $blog->footer_topic7_bn = $request->footer_topic7_bn;
        }
        if (!empty($request->footer_topic8_en)) {
            $blog->footer_topic8_en = $request->footer_topic8_en;
        }
        if (!empty($request->footer_topic8_bn)) {
            $blog->footer_topic8_bn = $request->footer_topic8_bn;
        }
        if (!empty($request->footer_topic9_en)) {
            $blog->footer_topic9_en = $request->footer_topic9_en;
        }
        if (!empty($request->footer_topic9_bn)) {
            $blog->footer_topic9_bn = $request->footer_topic9_bn;
        }
        if (!empty($request->footer_topic10_en)) {
            $blog->footer_topic10_en = $request->footer_topic10_en;
        }
        if (!empty($request->footer_topic10_bn)) {
            $blog->footer_topic10_bn = $request->footer_topic10_bn;
        }

        if(!empty($request->conclusiton_en)){
            $blog->conclusiton_en = $request->conclusiton_en;
        }
        if(!empty($request->conclusiton_bn)){
            $blog->conclusiton_bn = $request->conclusiton_bn;
        }
        $blog->save();
        return redirect('admin/blog/post/list')->with('message','Blog  Created Successfully');
    }//end method

    //edit
    public function edit($id){
        $categories = Category::get();
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('categories','blog'));
    }//end method

     //update
    public function update(Request $request,$id){
        $request->validate([
            'blog_category_id' =>'required',
            'title_en' => 'required|unique:blogs,title_en,'.$id,
            'title_bn' => 'required|unique:blogs,title_bn,'.$id,
            'content_en' => 'required',
            'content_bn' => 'required',
            'slug' => 'required',
            'image' => 'nullable|image',
        ],[
            'blog_category_id.required'=>'The category field is required',
            'title_en.required'=>'The title english field is required',
            'title_bn.required'=>'The title bangla field is required',
            'content_en.required'=>'The content english field is required',
            'content_bn.required'=>'The content bangla field is required',
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

        //image2 upload
        if($request->image2){
            if(File::exists($blog->image2)){
                unlink($blog->image2);
            }
            $image2 = $request->image2;
            $imageName2 = rand().'.'.$image2->getClientOriginalName();
            $image2->move(public_path('upload/blog_images/'),$imageName2);
            $imagePath2 = 'upload/blog_images/'.$imageName2;
        }

        //image3 upload
        if($request->image3){
            if(File::exists($blog->image3)){
                unlink($blog->image3);
            }
            $image3 = $request->image3;
            $imageName3 = rand().'.'.$image3->getClientOriginalName();
            $image3->move(public_path('upload/blog_images/'),$imageName3);
            $imagePath3 = 'upload/blog_images/'.$imageName3;
        }


        $blog->blog_category_id = $request->blog_category_id;
        $blog->user_id = Auth::user()->id;
        $blog->title_en = $request->title_en;
        $blog->title_bn = $request->title_bn;
        $blog->slug = Str::slug($request->title_en);
        if(!empty($request->image)){
            $blog->image = $imagePath;
        }
        $blog->content_en = $request->content_en;
        $blog->content_bn = $request->content_bn;
        if(!empty($request->image2)){
            $blog->image2 = $imagePath2;
        }
        if(!empty($request->video_url)){
            $blog->video_url = $request->video_url;
        }
        if(!empty($request->title2_en)){
            $blog->title2_en = $request->title2_en;
        }
        if(!empty($request->title2_bn)){
            $blog->title2_bn = $request->title2_bn;
        }
        if(!empty($request->content2_en)){
            $blog->content2_en = $request->content2_en;
        }
        if(!empty($request->content2_bn)){
            $blog->content2_bn = $request->content2_bn;
        }
        if(!empty($request->topic1_en)){
            $blog->topic1_en = $request->topic1_en;
        }
        if(!empty($request->topic1_bn)){
            $blog->topic1_bn = $request->topic1_bn;
        }
        if(!empty($request->topic2_en)){
            $blog->topic2_en = $request->topic2_en;
        }
        if(!empty($request->topic2_bn)){
            $blog->topic2_bn = $request->topic2_bn;
        }
        if(!empty($request->topic3_en)){
            $blog->topic3_en = $request->topic3_en;
        }
        if(!empty($request->topic3_bn)){
            $blog->topic3_bn = $request->topic3_bn;
        }
        if(!empty($request->topic4_en)){
            $blog->topic4_en = $request->topic4_en;
        }
        if(!empty($request->topic4_bn)){
            $blog->topic4_bn = $request->topic4_bn;
        }
        if (!empty($request->topic5_en)) {
            $blog->topic5_en = $request->topic5_en;
        }
        if (!empty($request->topic5_bn)) {
            $blog->topic5_bn = $request->topic5_bn;
        }
        if (!empty($request->topic6_en)) {
            $blog->topic6_en = $request->topic6_en;
        }
        if (!empty($request->topic6_bn)) {
            $blog->topic6_bn = $request->topic6_bn;
        }
        if (!empty($request->topic7_en)) {
            $blog->topic7_en = $request->topic7_en;
        }
        if (!empty($request->topic7_bn)) {
            $blog->topic7_bn = $request->topic7_bn;
        }
        if (!empty($request->topic8_en)) {
            $blog->topic8_en = $request->topic8_en;
        }
        if (!empty($request->topic8_bn)) {
            $blog->topic8_bn = $request->topic8_bn;
        }
        if (!empty($request->topic9_en)) {
            $blog->topic9_en = $request->topic9_en;
        }
        if (!empty($request->topic9_bn)) {
            $blog->topic9_bn = $request->topic9_bn;
        }
        if (!empty($request->topic10_en)) {
            $blog->topic10_en = $request->topic10_en;
        }
        if (!empty($request->topic10_bn)) {
            $blog->topic10_bn = $request->topic10_bn;
        }
        if(!empty($request->image3)){
            $blog->image3 = $imagePath3 ;
        }
        if(!empty($request->title3_en)){
            $blog->title3_en = $request->title3_en;
        }
        if(!empty($request->title3_bn)){
            $blog->title3_bn = $request->title3_bn;
        }
        if(!empty($request->content3_en)){
            $blog->content3_en = $request->content3_en;
        }
        if(!empty($request->content3_bn)){
            $blog->content3_bn = $request->content3_bn;
        }
        if(!empty($request->footer_topic1_en)){
            $blog->footer_topic1_en = $request->footer_topic1_en;
        }
        if(!empty($request->footer_topic1_bn)){
            $blog->footer_topic1_bn = $request->footer_topic1_bn;
        }
        if(!empty($request->footer_topic2_en)){
            $blog->footer_topic2_en = $request->footer_topic2_en;
        }
        if(!empty($request->footer_topic2_bn)){
            $blog->footer_topic2_bn = $request->footer_topic2_bn;
        }
        if(!empty($request->footer_topic3_en)){
            $blog->footer_topic3_en = $request->footer_topic3_en;
        }
        if(!empty($request->footer_topic3_bn)){
            $blog->footer_topic3_bn = $request->footer_topic3_bn;
        }
        if (!empty($request->footer_topic4_en)) {
            $blog->footer_topic4_en = $request->footer_topic4_en;
        }
        if (!empty($request->footer_topic4_bn)) {
            $blog->footer_topic4_bn = $request->footer_topic4_bn;
        }
        if (!empty($request->footer_topic5_en)) {
            $blog->footer_topic5_en = $request->footer_topic5_en;
        }
        if (!empty($request->footer_topic5_bn)) {
            $blog->footer_topic5_bn = $request->footer_topic5_bn;
        }
        if (!empty($request->footer_topic6_en)) {
            $blog->footer_topic6_en = $request->footer_topic6_en;
        }
        if (!empty($request->footer_topic6_bn)) {
            $blog->footer_topic6_bn = $request->footer_topic6_bn;
        }
        if (!empty($request->footer_topic7_en)) {
            $blog->footer_topic7_en = $request->footer_topic7_en;
        }
        if (!empty($request->footer_topic7_bn)) {
            $blog->footer_topic7_bn = $request->footer_topic7_bn;
        }
        if (!empty($request->footer_topic8_en)) {
            $blog->footer_topic8_en = $request->footer_topic8_en;
        }
        if (!empty($request->footer_topic8_bn)) {
            $blog->footer_topic8_bn = $request->footer_topic8_bn;
        }
        if (!empty($request->footer_topic9_en)) {
            $blog->footer_topic9_en = $request->footer_topic9_en;
        }
        if (!empty($request->footer_topic9_bn)) {
            $blog->footer_topic9_bn = $request->footer_topic9_bn;
        }
        if (!empty($request->footer_topic10_en)) {
            $blog->footer_topic10_en = $request->footer_topic10_en;
        }
        if (!empty($request->footer_topic10_bn)) {
            $blog->footer_topic10_bn = $request->footer_topic10_bn;
        }

        if(!empty($request->conclusiton_en)){
            $blog->conclusiton_en = $request->conclusiton_en;
        }
        if(!empty($request->conclusiton_bn)){
            $blog->conclusiton_bn = $request->conclusiton_bn;
        }
        $blog->save();
        return redirect('admin/blog/post/list')->with('message','Blog  Updated Successfully');
    }//end method

    //delete
    public function delete($id){
        $blog = Blog::find($id);
        if(File::exists($blog->image)){
                unlink($blog->image);
            }
        if(File::exists($blog->image2)){
            unlink($blog->image2);
        }
        if(File::exists($blog->image3)){
            unlink($blog->image3);
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
