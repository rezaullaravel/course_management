<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $instructors = User::role('teacher')->get();
        return view('admin.course.create',compact('categories','instructors'));

     }//end method


     //store
     public function store(Request $request){
        $request->validate([
            'course_category_id' =>'required',
            'teacher_id' =>'required',
            'title_en' => 'required|unique:courses',
            'title_bn' => 'required|unique:courses',
            'content_en' => 'required',
            'content_bn' => 'required',
            'image' => 'required|image',
        ],[
            'course_category_id.required'=>'The category field is required',
            'teacher_id.required'=>'The instructor field is required',
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
            $image->move(public_path('upload/course_images/'),$imageName);
            $imagePath = 'upload/course_images/'.$imageName;
        }

         //image2 upload
         if($request->image2){
            $image2 = $request->image2;
            $imageName2 = rand().'.'.$image2->getClientOriginalName();
            $image2->move(public_path('upload/course_images/'),$imageName2);
            $imagePath2 = 'upload/course_images/'.$imageName2;
        }

        $course = new Course();
        $course->course_category_id = $request->course_category_id;
        $course->user_id = Auth::user()->id;
        $course->teacher_id = $request->teacher_id;
        $course->title_en = $request->title_en;
        $course->title_bn = $request->title_bn;
        $course->slug = Str::slug($request->title_en);
        $course->image = $imagePath;
        if(!empty($request->video_url)){
            $course->video_url = $request->video_url;
        }
        $course->content_en = $request->content_en;
        $course->content_bn = $request->content_bn;
        if(!empty($request->topic1_en)){
            $course->topic1_en = $request->topic1_en;
        }
        if(!empty($request->topic1_bn)){
            $course->topic1_bn = $request->topic1_bn;
        }
        if (!empty($request->topic2_en)) {
            $course->topic2_en = $request->topic2_en;
        }
        if (!empty($request->topic2_bn)) {
            $course->topic2_bn = $request->topic2_bn;
        }
        if (!empty($request->topic3_en)) {
            $course->topic3_en = $request->topic3_en;
        }
        if (!empty($request->topic3_bn)) {
            $course->topic3_bn = $request->topic3_bn;
        }
        if (!empty($request->topic4_en)) {
            $course->topic4_en = $request->topic4_en;
        }
        if (!empty($request->topic4_bn)) {
            $course->topic4_bn = $request->topic4_bn;
        }
        if (!empty($request->topic5_en)) {
            $course->topic5_en = $request->topic5_en;
        }
        if (!empty($request->topic5_bn)) {
            $course->topic5_bn = $request->topic5_bn;
        }
        if (!empty($request->topic6_en)) {
            $course->topic6_en = $request->topic6_en;
        }
        if (!empty($request->topic6_bn)) {
            $course->topic6_bn = $request->topic6_bn;
        }
        if (!empty($request->topic7_en)) {
            $course->topic7_en = $request->topic7_en;
        }
        if (!empty($request->topic7_bn)) {
            $course->topic7_bn = $request->topic7_bn;
        }
        if (!empty($request->topic8_en)) {
            $course->topic8_en = $request->topic8_en;
        }
        if (!empty($request->topic8_bn)) {
            $course->topic8_bn = $request->topic8_bn;
        }
        if (!empty($request->topic9_en)) {
            $course->topic9_en = $request->topic9_en;
        }
        if (!empty($request->topic9_bn)) {
            $course->topic9_bn = $request->topic9_bn;
        }
        if (!empty($request->topic10_en)) {
            $course->topic10_en = $request->topic10_en;
        }
        if (!empty($request->topic10_bn)) {
            $course->topic10_bn = $request->topic10_bn;
        }
        if (!empty($request->topic11_en)) {
            $course->topic11_en = $request->topic11_en;
        }
        if (!empty($request->topic11_bn)) {
            $course->topic11_bn = $request->topic11_bn;
        }
        if (!empty($request->topic12_en)) {
            $course->topic12_en = $request->topic12_en;
        }
        if (!empty($request->topic12_bn)) {
            $course->topic12_bn = $request->topic12_bn;
        }
        if (!empty($request->topic13_en)) {
            $course->topic13_en = $request->topic13_en;
        }
        if (!empty($request->topic13_bn)) {
            $course->topic13_bn = $request->topic13_bn;
        }
        if (!empty($request->topic14_en)) {
            $course->topic14_en = $request->topic14_en;
        }
        if (!empty($request->topic14_bn)) {
            $course->topic14_bn = $request->topic14_bn;
        }
        if (!empty($request->topic15_en)) {
            $course->topic15_en = $request->topic15_en;
        }
        if (!empty($request->topic15_bn)) {
            $course->topic15_bn = $request->topic15_bn;
        }

        if(!empty($request->image2)){
            $course->image2 = $imagePath2;
        }

        if(!empty($request->content2_en)){
            $course->content2_en = $request->content2_en;
        }
        if(!empty($request->content2_bn)){
            $course->content2_bn = $request->content2_bn;
        }
        if(!empty($request->footer_topic1_en)){
            $course->footer_topic1_en = $request->footer_topic1_en;
        }
        if(!empty($request->footer_topic1_bn)){
            $course->footer_topic1_bn = $request->footer_topic1_bn;
        }
        if (!empty($request->footer_topic2_en)) {
            $course->footer_topic2_en = $request->footer_topic2_en;
        }
        if (!empty($request->footer_topic2_bn)) {
            $course->footer_topic2_bn = $request->footer_topic2_bn;
        }
        if (!empty($request->footer_topic3_en)) {
            $course->footer_topic3_en = $request->footer_topic3_en;
        }
        if (!empty($request->footer_topic3_bn)) {
            $course->footer_topic3_bn = $request->footer_topic3_bn;
        }
        if (!empty($request->footer_topic4_en)) {
            $course->footer_topic4_en = $request->footer_topic4_en;
        }
        if (!empty($request->footer_topic4_bn)) {
            $course->footer_topic4_bn = $request->footer_topic4_bn;
        }
        if (!empty($request->footer_topic5_en)) {
            $course->footer_topic5_en = $request->footer_topic5_en;
        }
        if (!empty($request->footer_topic5_bn)) {
            $course->footer_topic5_bn = $request->footer_topic5_bn;
        }
        if (!empty($request->footer_topic6_en)) {
            $course->footer_topic6_en = $request->footer_topic6_en;
        }
        if (!empty($request->footer_topic6_bn)) {
            $course->footer_topic6_bn = $request->footer_topic6_bn;
        }
        if (!empty($request->footer_topic7_en)) {
            $course->footer_topic7_en = $request->footer_topic7_en;
        }
        if (!empty($request->footer_topic7_bn)) {
            $course->footer_topic7_bn = $request->footer_topic7_bn;
        }
        if (!empty($request->footer_topic8_en)) {
            $course->footer_topic8_en = $request->footer_topic8_en;
        }
        if (!empty($request->footer_topic8_bn)) {
            $course->footer_topic8_bn = $request->footer_topic8_bn;
        }
        if (!empty($request->footer_topic9_en)) {
            $course->footer_topic9_en = $request->footer_topic9_en;
        }
        if (!empty($request->footer_topic9_bn)) {
            $course->footer_topic9_bn = $request->footer_topic9_bn;
        }
        if (!empty($request->footer_topic10_en)) {
            $course->footer_topic10_en = $request->footer_topic10_en;
        }
        if (!empty($request->footer_topic10_bn)) {
            $course->footer_topic10_bn = $request->footer_topic10_bn;
        }
        if (!empty($request->feature1_en)) {
            $course->feature1_en = $request->feature1_en;
        }
        if (!empty($request->feature1_bn)) {
            $course->feature1_bn = $request->feature1_bn;
        }
        if (!empty($request->feature2_en)) {
            $course->feature2_en = $request->feature2_en;
        }
        if (!empty($request->feature2_bn)) {
            $course->feature2_bn = $request->feature2_bn;
        }
        if (!empty($request->feature3_en)) {
            $course->feature3_en = $request->feature3_en;
        }
        if (!empty($request->feature3_bn)) {
            $course->feature3_bn = $request->feature3_bn;
        }
        if (!empty($request->feature4_en)) {
            $course->feature4_en = $request->feature4_en;
        }
        if (!empty($request->feature4_bn)) {
            $course->feature4_bn = $request->feature4_bn;
        }
        if (!empty($request->feature5_en)) {
            $course->feature5_en = $request->feature5_en;
        }
        if (!empty($request->feature5_bn)) {
            $course->feature5_bn = $request->feature5_bn;
        }
        if (!empty($request->feature6_en)) {
            $course->feature6_en = $request->feature6_en;
        }
        if (!empty($request->feature6_bn)) {
            $course->feature6_bn = $request->feature6_bn;
        }
        if (!empty($request->feature7_en)) {
            $course->feature7_en = $request->feature7_en;
        }
        if (!empty($request->feature7_bn)) {
            $course->feature7_bn = $request->feature7_bn;
        }
        if (!empty($request->feature8_en)) {
            $course->feature8_en = $request->feature8_en;
        }
        if (!empty($request->feature8_bn)) {
            $course->feature8_bn = $request->feature8_bn;
        }
        if (!empty($request->feature9_en)) {
            $course->feature9_en = $request->feature9_en;
        }
        if (!empty($request->feature9_bn)) {
            $course->feature9_bn = $request->feature9_bn;
        }
        if (!empty($request->feature10_en)) {
            $course->feature10_en = $request->feature10_en;
        }
        if (!empty($request->feature10_bn)) {
            $course->feature10_bn = $request->feature10_bn;
        }
        if (!empty($request->price_en)) {
            $course->price_en = $request->price_en;
        }
        if (!empty($request->price_bn)) {
            $course->price_bn = $request->price_bn;
        }

        if (!empty($request->original_price_en)) {
            $course->original_price_en = $request->original_price_en;
        }

        if (!empty($request->original_price_bn)) {
            $course->original_price_bn = $request->original_price_bn;
        }

        $course->save();
        return redirect('admin/course/post/list')->with('message','Course  Created Successfully');
     }//end method


     //edit
     public function edit($id){
        $categories = Category::all();
        $course = Course::find($id);
        $instructors = User::role('teacher')->get();
        return view('admin.course.edit',compact('categories','course','instructors'));
     }//end method

     //update
     public function update(Request $request,$id){
        $request->validate([
            'course_category_id' =>'required',
            'teacher_id' =>'required',
            'title_en' => 'required|unique:courses,title_en,'.$id,
            'title_bn' => 'required|unique:courses,title_bn,'.$id,
            'content_en' => 'required',
            'content_bn' => 'required',
            'image' => 'nullable|image',
        ],[
            'course_category_id.required'=>'The category field is required',
            'teacher_id.required'=>'The instructor field is required',
            'title_en.required'=>'The title english field is required',
            'title_bn.required'=>'The title bangla field is required',
            'content_en.required'=>'The content english field is required',
            'content_bn.required'=>'The content bangla field is required',
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

         //image2 upload
         if($request->image2){
            if(File::exists($course->image2)){
                unlink($course->image2);
            }
            $image2 = $request->image2;
            $imageName2 = rand().'.'.$image2->getClientOriginalName();
            $image2->move(public_path('upload/course_images/'),$imageName2);
            $imagePath2 = 'upload/course_images/'.$imageName2;
        }


        $course->course_category_id = $request->course_category_id;
        $course->user_id = Auth::user()->id;
        $course->teacher_id = $request->teacher_id;
        $course->title_en = $request->title_en;
        $course->title_bn = $request->title_bn;
        $course->slug = $request->slug;
        if(!empty($request->image)){
            $course->image = $imagePath;
        }

        if(!empty($request->video_url)){
            $course->video_url = $request->video_url;
        }
        $course->content_en = $request->content_en;
        $course->content_bn = $request->content_bn;
        if(!empty($request->topic1_en)){
            $course->topic1_en = $request->topic1_en;
        }
        if(!empty($request->topic1_bn)){
            $course->topic1_bn = $request->topic1_bn;
        }
        if (!empty($request->topic2_en)) {
            $course->topic2_en = $request->topic2_en;
        }
        if (!empty($request->topic2_bn)) {
            $course->topic2_bn = $request->topic2_bn;
        }
        if (!empty($request->topic3_en)) {
            $course->topic3_en = $request->topic3_en;
        }
        if (!empty($request->topic3_bn)) {
            $course->topic3_bn = $request->topic3_bn;
        }
        if (!empty($request->topic4_en)) {
            $course->topic4_en = $request->topic4_en;
        }
        if (!empty($request->topic4_bn)) {
            $course->topic4_bn = $request->topic4_bn;
        }
        if (!empty($request->topic5_en)) {
            $course->topic5_en = $request->topic5_en;
        }
        if (!empty($request->topic5_bn)) {
            $course->topic5_bn = $request->topic5_bn;
        }
        if (!empty($request->topic6_en)) {
            $course->topic6_en = $request->topic6_en;
        }
        if (!empty($request->topic6_bn)) {
            $course->topic6_bn = $request->topic6_bn;
        }
        if (!empty($request->topic7_en)) {
            $course->topic7_en = $request->topic7_en;
        }
        if (!empty($request->topic7_bn)) {
            $course->topic7_bn = $request->topic7_bn;
        }
        if (!empty($request->topic8_en)) {
            $course->topic8_en = $request->topic8_en;
        }
        if (!empty($request->topic8_bn)) {
            $course->topic8_bn = $request->topic8_bn;
        }
        if (!empty($request->topic9_en)) {
            $course->topic9_en = $request->topic9_en;
        }
        if (!empty($request->topic9_bn)) {
            $course->topic9_bn = $request->topic9_bn;
        }
        if (!empty($request->topic10_en)) {
            $course->topic10_en = $request->topic10_en;
        }
        if (!empty($request->topic10_bn)) {
            $course->topic10_bn = $request->topic10_bn;
        }
        if (!empty($request->topic11_en)) {
            $course->topic11_en = $request->topic11_en;
        }
        if (!empty($request->topic11_bn)) {
            $course->topic11_bn = $request->topic11_bn;
        }
        if (!empty($request->topic12_en)) {
            $course->topic12_en = $request->topic12_en;
        }
        if (!empty($request->topic12_bn)) {
            $course->topic12_bn = $request->topic12_bn;
        }
        if (!empty($request->topic13_en)) {
            $course->topic13_en = $request->topic13_en;
        }
        if (!empty($request->topic13_bn)) {
            $course->topic13_bn = $request->topic13_bn;
        }
        if (!empty($request->topic14_en)) {
            $course->topic14_en = $request->topic14_en;
        }
        if (!empty($request->topic14_bn)) {
            $course->topic14_bn = $request->topic14_bn;
        }
        if (!empty($request->topic15_en)) {
            $course->topic15_en = $request->topic15_en;
        }
        if (!empty($request->topic15_bn)) {
            $course->topic15_bn = $request->topic15_bn;
        }

        if(!empty($request->image2)){
            $course->image2 = $imagePath2;
        }

        if(!empty($request->content2_en)){
            $course->content2_en = $request->content2_en;
        }
        if(!empty($request->content2_bn)){
            $course->content2_bn = $request->content2_bn;
        }
        if(!empty($request->footer_topic1_en)){
            $course->footer_topic1_en = $request->footer_topic1_en;
        }
        if(!empty($request->footer_topic1_bn)){
            $course->footer_topic1_bn = $request->footer_topic1_bn;
        }
        if (!empty($request->footer_topic2_en)) {
            $course->footer_topic2_en = $request->footer_topic2_en;
        }
        if (!empty($request->footer_topic2_bn)) {
            $course->footer_topic2_bn = $request->footer_topic2_bn;
        }
        if (!empty($request->footer_topic3_en)) {
            $course->footer_topic3_en = $request->footer_topic3_en;
        }
        if (!empty($request->footer_topic3_bn)) {
            $course->footer_topic3_bn = $request->footer_topic3_bn;
        }
        if (!empty($request->footer_topic4_en)) {
            $course->footer_topic4_en = $request->footer_topic4_en;
        }
        if (!empty($request->footer_topic4_bn)) {
            $course->footer_topic4_bn = $request->footer_topic4_bn;
        }
        if (!empty($request->footer_topic5_en)) {
            $course->footer_topic5_en = $request->footer_topic5_en;
        }
        if (!empty($request->footer_topic5_bn)) {
            $course->footer_topic5_bn = $request->footer_topic5_bn;
        }
        if (!empty($request->footer_topic6_en)) {
            $course->footer_topic6_en = $request->footer_topic6_en;
        }
        if (!empty($request->footer_topic6_bn)) {
            $course->footer_topic6_bn = $request->footer_topic6_bn;
        }
        if (!empty($request->footer_topic7_en)) {
            $course->footer_topic7_en = $request->footer_topic7_en;
        }
        if (!empty($request->footer_topic7_bn)) {
            $course->footer_topic7_bn = $request->footer_topic7_bn;
        }
        if (!empty($request->footer_topic8_en)) {
            $course->footer_topic8_en = $request->footer_topic8_en;
        }
        if (!empty($request->footer_topic8_bn)) {
            $course->footer_topic8_bn = $request->footer_topic8_bn;
        }
        if (!empty($request->footer_topic9_en)) {
            $course->footer_topic9_en = $request->footer_topic9_en;
        }
        if (!empty($request->footer_topic9_bn)) {
            $course->footer_topic9_bn = $request->footer_topic9_bn;
        }
        if (!empty($request->footer_topic10_en)) {
            $course->footer_topic10_en = $request->footer_topic10_en;
        }
        if (!empty($request->footer_topic10_bn)) {
            $course->footer_topic10_bn = $request->footer_topic10_bn;
        }
        if (!empty($request->feature1_en)) {
            $course->feature1_en = $request->feature1_en;
        }
        if (!empty($request->feature1_bn)) {
            $course->feature1_bn = $request->feature1_bn;
        }
        if (!empty($request->feature2_en)) {
            $course->feature2_en = $request->feature2_en;
        }
        if (!empty($request->feature2_bn)) {
            $course->feature2_bn = $request->feature2_bn;
        }
        if (!empty($request->feature3_en)) {
            $course->feature3_en = $request->feature3_en;
        }
        if (!empty($request->feature3_bn)) {
            $course->feature3_bn = $request->feature3_bn;
        }
        if (!empty($request->feature4_en)) {
            $course->feature4_en = $request->feature4_en;
        }
        if (!empty($request->feature4_bn)) {
            $course->feature4_bn = $request->feature4_bn;
        }
        if (!empty($request->feature5_en)) {
            $course->feature5_en = $request->feature5_en;
        }
        if (!empty($request->feature5_bn)) {
            $course->feature5_bn = $request->feature5_bn;
        }
        if (!empty($request->feature6_en)) {
            $course->feature6_en = $request->feature6_en;
        }
        if (!empty($request->feature6_bn)) {
            $course->feature6_bn = $request->feature6_bn;
        }
        if (!empty($request->feature7_en)) {
            $course->feature7_en = $request->feature7_en;
        }
        if (!empty($request->feature7_bn)) {
            $course->feature7_bn = $request->feature7_bn;
        }
        if (!empty($request->feature8_en)) {
            $course->feature8_en = $request->feature8_en;
        }
        if (!empty($request->feature8_bn)) {
            $course->feature8_bn = $request->feature8_bn;
        }
        if (!empty($request->feature9_en)) {
            $course->feature9_en = $request->feature9_en;
        }
        if (!empty($request->feature9_bn)) {
            $course->feature9_bn = $request->feature9_bn;
        }
        if (!empty($request->feature10_en)) {
            $course->feature10_en = $request->feature10_en;
        }
        if (!empty($request->feature10_bn)) {
            $course->feature10_bn = $request->feature10_bn;
        }
        if (!empty($request->price_en)) {
            $course->price_en = $request->price_en;
        }
        if (!empty($request->price_bn)) {
            $course->price_bn = $request->price_bn;
        }

        if (!empty($request->original_price_en)) {
            $course->original_price_en = $request->original_price_en;
        }

        if (!empty($request->original_price_bn)) {
            $course->original_price_bn = $request->original_price_bn;
        }

        $course->save();
        return redirect('admin/course/post/list')->with('message','Course  Updated Successfully');
     }//end method

     //delete
     public function delete($id){
        $course = Course::find($id);

        if(File::exists($course->image)){
            unlink($course->image);
        }

        if(File::exists($course->image2)){
            unlink($course->image2);
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
