<?php

namespace App\Http\Controllers\Backend;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AboutUsController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-about-us'), only:['index']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-about-us'), only:['create','store']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-about-us'), only:['edit','update']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-about-us'), only:['delete']),
     ];
     }

     //about us list
     public function index(){
        $aboutus = AboutUs::get();
        return view('admin.about_us.index',compact('aboutus'));
     }

     //create
     public function create(){
        return view('admin.about_us.create');
     }//end method

     //store
     public function store(Request $request){
        $request->validate([
            'title_en'=>'required',
            'title_bn'=>'required',
            'image1'=>'required',
            'image2'=>'required',
            'image3'=>'required',
            'image4'=>'required',
            'title1_en'=>'required',
            'title1_bn'=>'required',
            'description1_en'=>'required',
            'description1_bn'=>'required',
            'title2_en'=>'required',
            'title2_bn'=>'required',
            'description2_en'=>'required',
            'description2_bn'=>'required',
        ]);

        //image one
        if($request->image1){
            $image1 = $request->image1;
            $imageName1 = rand().'.'.$image1->getClientOriginalName();
            $image1->move(public_path('upload/about_us_images/'),$imageName1);
            $imagePath1 = 'upload/about_us_images/'.$imageName1;
        }
        //image2 upload
        if($request->image2){
            $image2 = $request->image2;
            $imageName2 = rand().'.'.$image2->getClientOriginalName();
            $image2->move(public_path('upload/about_us_images/'),$imageName2);
            $imagePath2 = 'upload/about_us_images/'.$imageName2;
        }

        //image3 upload
        if($request->image3){
            $image3 = $request->image3;
            $imageName3 = rand().'.'.$image3->getClientOriginalName();
            $image3->move(public_path('upload/about_us_images/'),$imageName3);
            $imagePath3 = 'upload/about_us_images/'.$imageName3;
        }

        //image4 upload
        if($request->image4){
            $image4 = $request->image4;
            $imageName4 = rand().'.'.$image4->getClientOriginalName();
            $image4->move(public_path('upload/about_us_images/'),$imageName4);
            $imagePath4 = 'upload/about_us_images/'.$imageName4;
        }

        $about = new AboutUs();
        $about->title_en = $request->title_en;
        $about->title_bn = $request->title_bn;
        $about->title1_en = $request->title1_en;
        $about->title1_bn = $request->title1_bn;
        $about->description1_en = $request->description1_en;
        $about->description1_bn = $request->description1_bn;
        $about->title2_en = $request->title2_en;
        $about->title2_bn = $request->title2_bn;
        $about->description2_en = $request->description2_en;
        $about->description2_bn = $request->description2_bn;

        if(!empty($request->image1)){
            $about->image1 = $imagePath1;
        }
        if(!empty($request->image2)){
            $about->image2 = $imagePath2;
        }
        if (!empty($request->image3)) {
            $about->image3 = $imagePath3;
        }
        if (!empty($request->image4)) {
            $about->image4 = $imagePath4;
        }

        if(!empty($request->feature1_en)){
            $about->feature1_en = $request->feature1_en;
        }
        if(!empty($request->feature1_bn)){
            $about->feature1_bn = $request->feature1_bn;
        }
        if (!empty($request->feature2_en)) {
            $about->feature2_en = $request->feature2_en;
        }
        if (!empty($request->feature2_bn)) {
            $about->feature2_bn = $request->feature2_bn;
        }

        if (!empty($request->feature3_en)) {
            $about->feature3_en = $request->feature3_en;
        }
        if (!empty($request->feature3_bn)) {
            $about->feature3_bn = $request->feature3_bn;
        }

        if (!empty($request->feature4_en)) {
            $about->feature4_en = $request->feature4_en;
        }
        if (!empty($request->feature4_bn)) {
            $about->feature4_bn = $request->feature4_bn;
        }

        if (!empty($request->feature5_en)) {
            $about->feature5_en = $request->feature5_en;
        }
        if (!empty($request->feature5_bn)) {
            $about->feature5_bn = $request->feature5_bn;
        }

        if (!empty($request->feature6_en)) {
            $about->feature6_en = $request->feature6_en;
        }
        if (!empty($request->feature6_bn)) {
            $about->feature6_bn = $request->feature6_bn;
        }

        if (!empty($request->feature7_en)) {
            $about->feature7_en = $request->feature7_en;
        }
        if (!empty($request->feature7_bn)) {
            $about->feature7_bn = $request->feature7_bn;
        }

        if (!empty($request->feature8_en)) {
            $about->feature8_en = $request->feature8_en;
        }
        if (!empty($request->feature8_bn)) {
            $about->feature8_bn = $request->feature8_bn;
        }

        if (!empty($request->feature9_en)) {
            $about->feature9_en = $request->feature9_en;
        }
        if (!empty($request->feature9_bn)) {
            $about->feature9_bn = $request->feature9_bn;
        }

        if (!empty($request->feature10_en)) {
            $about->feature10_en = $request->feature10_en;
        }
        if (!empty($request->feature10_bn)) {
            $about->feature10_bn = $request->feature10_bn;
        }


        if (!empty($request->footer_topic1_en)) {
            $about->footer_topic1_en = $request->footer_topic1_en;
        }
        if (!empty($request->footer_topic1_bn)) {
            $about->footer_topic1_bn = $request->footer_topic1_bn;
        }
        if (!empty($request->footer_topic2_en)) {
            $about->footer_topic2_en = $request->footer_topic2_en;
        }
        if (!empty($request->footer_topic2_bn)) {
            $about->footer_topic2_bn = $request->footer_topic2_bn;
        }

        if (!empty($request->footer_topic3_en)) {
            $about->footer_topic3_en = $request->footer_topic3_en;
        }
        if (!empty($request->footer_topic3_bn)) {
            $about->footer_topic3_bn = $request->footer_topic3_bn;
        }

        if (!empty($request->footer_topic4_en)) {
            $about->footer_topic4_en = $request->footer_topic4_en;
        }
        if (!empty($request->footer_topic4_bn)) {
            $about->footer_topic4_bn = $request->footer_topic4_bn;
        }

        if (!empty($request->footer_topic5_en)) {
            $about->footer_topic5_en = $request->footer_topic5_en;
        }
        if (!empty($request->footer_topic5_bn)) {
            $about->footer_topic5_bn = $request->footer_topic5_bn;
        }

        if (!empty($request->footer_topic6_en)) {
            $about->footer_topic6_en = $request->footer_topic6_en;
        }
        if (!empty($request->footer_topic6_bn)) {
            $about->footer_topic6_bn = $request->footer_topic6_bn;
        }

        if (!empty($request->footer_topic7_en)) {
            $about->footer_topic7_en = $request->footer_topic7_en;
        }
        if (!empty($request->footer_topic7_bn)) {
            $about->footer_topic7_bn = $request->footer_topic7_bn;
        }

        if (!empty($request->footer_topic8_en)) {
            $about->footer_topic8_en = $request->footer_topic8_en;
        }
        if (!empty($request->footer_topic8_bn)) {
            $about->footer_topic8_bn = $request->footer_topic8_bn;
        }

        if (!empty($request->footer_topic9_en)) {
            $about->footer_topic9_en = $request->footer_topic9_en;
        }
        if (!empty($request->footer_topic9_bn)) {
            $about->footer_topic9_bn = $request->footer_topic9_bn;
        }

        if (!empty($request->footer_topic10_en)) {
            $about->footer_topic10_en = $request->footer_topic10_en;
        }
        if (!empty($request->footer_topic10_bn)) {
            $about->footer_topic10_bn = $request->footer_topic10_bn;
        }

        $about->save();
        return redirect('admin/about-us/list')->with('message','About Us  Created Successfully');
     }//end method

     //edit
     public function edit($id){
        $about = AboutUs::find($id);
        return view('admin.about_us.edit',compact('about'));
     }

     //update
     public function update(Request $request,$id){
        $request->validate([
            'title_en'=>'required',
            'title_bn'=>'required',
            'title1_en'=>'required',
            'title1_bn'=>'required',
            'description1_en'=>'required',
            'description1_bn'=>'required',
            'title2_en'=>'required',
            'title2_bn'=>'required',
            'description2_en'=>'required',
            'description2_bn'=>'required',
        ]);
        $about = AboutUs::find($id);
        //image one
        if($request->image1){
            if(File::exists($about->image1)){
                unlink($about->image1);
            }
            $image1 = $request->image1;
            $imageName1 = rand().'.'.$image1->getClientOriginalName();
            $image1->move(public_path('upload/about_us_images/'),$imageName1);
            $imagePath1 = 'upload/about_us_images/'.$imageName1;
        }
        //image2 upload
        if($request->image2){
         if(File::exists($about->image2)){
                unlink($about->image2);
            }
            $image2 = $request->image2;
            $imageName2 = rand().'.'.$image2->getClientOriginalName();
            $image2->move(public_path('upload/about_us_images/'),$imageName2);
            $imagePath2 = 'upload/about_us_images/'.$imageName2;
        }

        //image3 upload
        if($request->image3){
         if(File::exists($about->image3)){
                unlink($about->image3);
            }
            $image3 = $request->image3;
            $imageName3 = rand().'.'.$image3->getClientOriginalName();
            $image3->move(public_path('upload/about_us_images/'),$imageName3);
            $imagePath3 = 'upload/about_us_images/'.$imageName3;
        }

        //image4 upload
        if($request->image4){
         if(File::exists($about->image4)){
                unlink($about->image4);
            }
            $image4 = $request->image4;
            $imageName4 = rand().'.'.$image4->getClientOriginalName();
            $image4->move(public_path('upload/about_us_images/'),$imageName4);
            $imagePath4 = 'upload/about_us_images/'.$imageName4;
        }


        $about->title_en = $request->title_en;
        $about->title_bn = $request->title_bn;
        $about->title1_en = $request->title1_en;
        $about->title1_bn = $request->title1_bn;
        $about->description1_en = $request->description1_en;
        $about->description1_bn = $request->description1_bn;
        $about->title2_en = $request->title2_en;
        $about->title2_bn = $request->title2_bn;
        $about->description2_en = $request->description2_en;
        $about->description2_bn = $request->description2_bn;

        if(!empty($request->image1)){
            $about->image1 = $imagePath1;
        }
        if(!empty($request->image2)){
            $about->image2 = $imagePath2;
        }
        if (!empty($request->image3)) {
            $about->image3 = $imagePath3;
        }
        if (!empty($request->image4)) {
            $about->image4 = $imagePath4;
        }

        if(!empty($request->feature1_en)){
            $about->feature1_en = $request->feature1_en;
        }
        if(!empty($request->feature1_bn)){
            $about->feature1_bn = $request->feature1_bn;
        }
        if (!empty($request->feature2_en)) {
            $about->feature2_en = $request->feature2_en;
        }
        if (!empty($request->feature2_bn)) {
            $about->feature2_bn = $request->feature2_bn;
        }

        if (!empty($request->feature3_en)) {
            $about->feature3_en = $request->feature3_en;
        }
        if (!empty($request->feature3_bn)) {
            $about->feature3_bn = $request->feature3_bn;
        }

        if (!empty($request->feature4_en)) {
            $about->feature4_en = $request->feature4_en;
        }
        if (!empty($request->feature4_bn)) {
            $about->feature4_bn = $request->feature4_bn;
        }

        if (!empty($request->feature5_en)) {
            $about->feature5_en = $request->feature5_en;
        }
        if (!empty($request->feature5_bn)) {
            $about->feature5_bn = $request->feature5_bn;
        }

        if (!empty($request->feature6_en)) {
            $about->feature6_en = $request->feature6_en;
        }
        if (!empty($request->feature6_bn)) {
            $about->feature6_bn = $request->feature6_bn;
        }

        if (!empty($request->feature7_en)) {
            $about->feature7_en = $request->feature7_en;
        }
        if (!empty($request->feature7_bn)) {
            $about->feature7_bn = $request->feature7_bn;
        }

        if (!empty($request->feature8_en)) {
            $about->feature8_en = $request->feature8_en;
        }
        if (!empty($request->feature8_bn)) {
            $about->feature8_bn = $request->feature8_bn;
        }

        if (!empty($request->feature9_en)) {
            $about->feature9_en = $request->feature9_en;
        }
        if (!empty($request->feature9_bn)) {
            $about->feature9_bn = $request->feature9_bn;
        }

        if (!empty($request->feature10_en)) {
            $about->feature10_en = $request->feature10_en;
        }
        if (!empty($request->feature10_bn)) {
            $about->feature10_bn = $request->feature10_bn;
        }


        if (!empty($request->footer_topic1_en)) {
            $about->footer_topic1_en = $request->footer_topic1_en;
        }
        if (!empty($request->footer_topic1_bn)) {
            $about->footer_topic1_bn = $request->footer_topic1_bn;
        }
        if (!empty($request->footer_topic2_en)) {
            $about->footer_topic2_en = $request->footer_topic2_en;
        }
        if (!empty($request->footer_topic2_bn)) {
            $about->footer_topic2_bn = $request->footer_topic2_bn;
        }

        if (!empty($request->footer_topic3_en)) {
            $about->footer_topic3_en = $request->footer_topic3_en;
        }
        if (!empty($request->footer_topic3_bn)) {
            $about->footer_topic3_bn = $request->footer_topic3_bn;
        }

        if (!empty($request->footer_topic4_en)) {
            $about->footer_topic4_en = $request->footer_topic4_en;
        }
        if (!empty($request->footer_topic4_bn)) {
            $about->footer_topic4_bn = $request->footer_topic4_bn;
        }

        if (!empty($request->footer_topic5_en)) {
            $about->footer_topic5_en = $request->footer_topic5_en;
        }
        if (!empty($request->footer_topic5_bn)) {
            $about->footer_topic5_bn = $request->footer_topic5_bn;
        }

        if (!empty($request->footer_topic6_en)) {
            $about->footer_topic6_en = $request->footer_topic6_en;
        }
        if (!empty($request->footer_topic6_bn)) {
            $about->footer_topic6_bn = $request->footer_topic6_bn;
        }

        if (!empty($request->footer_topic7_en)) {
            $about->footer_topic7_en = $request->footer_topic7_en;
        }
        if (!empty($request->footer_topic7_bn)) {
            $about->footer_topic7_bn = $request->footer_topic7_bn;
        }

        if (!empty($request->footer_topic8_en)) {
            $about->footer_topic8_en = $request->footer_topic8_en;
        }
        if (!empty($request->footer_topic8_bn)) {
            $about->footer_topic8_bn = $request->footer_topic8_bn;
        }

        if (!empty($request->footer_topic9_en)) {
            $about->footer_topic9_en = $request->footer_topic9_en;
        }
        if (!empty($request->footer_topic9_bn)) {
            $about->footer_topic9_bn = $request->footer_topic9_bn;
        }

        if (!empty($request->footer_topic10_en)) {
            $about->footer_topic10_en = $request->footer_topic10_en;
        }
        if (!empty($request->footer_topic10_bn)) {
            $about->footer_topic10_bn = $request->footer_topic10_bn;
        }

        $about->save();
        return redirect('admin/about-us/list')->with('message','About Us  Updated Successfully');
     }//end method
}
