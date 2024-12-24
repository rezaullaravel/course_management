<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TestimonialController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-testimonial'), only:['index']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-testimonial'), only:['create','store']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-testimonial'), only:['edit','update']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-testimonial'), only:['delete']),
     ];
     }

     //testimonial list
     public function index(){
        $testimonials = Testimonial::get();
        return view('admin.testimonial.index',compact('testimonials'));
     }

     //create
     public function create(){
        return view('admin.testimonial.create');
     }//end method

     //store
     public function store(Request $request){
        //image upload
        if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/testimonial_images/'),$imageName);
            $imagePath = 'upload/testimonial_images/'.$imageName;
        }

        //logo upload
        if($request->logo){
            $logo = $request->logo;
            $logoName = rand().'.'.$logo->getClientOriginalName();
            $logo->move(public_path('upload/testimonial_images/'),$logoName);
            $logoPath = 'upload/testimonial_images/'.$logoName;
        }

        $testimonial = new Testimonial();
        $testimonial->title_en = $request->title_en;
        $testimonial->title_bn = $request->title_bn;
        $testimonial->description_en = $request->description_en;
        $testimonial->description_bn = $request->description_bn;
        $testimonial->name_en = $request->name_en;
        $testimonial->name_bn = $request->name_bn;
        $testimonial->profession_en = $request->profession_en;
        $testimonial->profession_bn = $request->profession_bn;
        $testimonial->logo = $logoPath;
        $testimonial->image = $imagePath;
        $testimonial->save();

        return redirect('admin/testimonial/list')->with('message','Testimonial Created Successfully');
     }//end method

     //edit
     public function edit($id){
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit',compact('testimonial'));
     }//end method

     //update
     public function update(Request $request,$id){
        $testimonial = Testimonial::find($id);
         //image upload
         if($request->image){
            if(File::exists($testimonial->image)){
                unlink($testimonial->image);
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/testimonial_images/'),$imageName);
            $imagePath = 'upload/testimonial_images/'.$imageName;
        }

        //logo upload
        if($request->logo){
            if(File::exists($testimonial->logo)){
                unlink($testimonial->logo);
            }
            $logo = $request->logo;
            $logoName = rand().'.'.$logo->getClientOriginalName();
            $logo->move(public_path('upload/testimonial_images/'),$logoName);
            $logoPath = 'upload/testimonial_images/'.$logoName;
        }


        $testimonial->title_en = $request->title_en;
        $testimonial->title_bn = $request->title_bn;
        $testimonial->description_en = $request->description_en;
        $testimonial->description_bn = $request->description_bn;
        $testimonial->name_en = $request->name_en;
        $testimonial->name_bn = $request->name_bn;
        $testimonial->profession_en = $request->profession_en;
        $testimonial->profession_bn = $request->profession_bn;
        if(!empty($request->logo)){
            $testimonial->logo = $logoPath;
        }
        if(!empty($request->image)){
            $testimonial->image = $imagePath;
        }


        $testimonial->save();

        return redirect('admin/testimonial/list')->with('message','Testimonial Updated Successfully');
     }//end method

     //delete
     public function delete($id){
        $testimonial = Testimonial::find($id);

           if(File::exists($testimonial->image)){
               unlink($testimonial->image);
            }

           if(File::exists($testimonial->logo)){
               unlink($testimonial->logo);
           }

           $testimonial->delete();
           return redirect('admin/testimonial/list')->with('message','Testimonial Deleted Successfully');
     }//end method
}
