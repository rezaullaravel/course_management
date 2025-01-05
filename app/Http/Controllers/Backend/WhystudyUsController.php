<?php

namespace App\Http\Controllers\Backend;

use App\Models\WhystudyUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class WhystudyUsController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('why-studyus-view'), only:['index']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('why-studyus-create'), only:['create','store']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('why-studyus-edit'), only:['edit','update']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('why-studyus-delete'), only:['delete']),
     ];
     }

     public function index(){
        $data = WhystudyUs::orderBy('id','desc')->get();
        return view('admin.why_study_us.index',compact('data'));
     }//end method

     public function create(){
        return view('admin.why_study_us.create');
     }

     public function store(Request $request){
        //image upload
        if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/why_studyus_images/'),$imageName);
            $imagePath = 'upload/why_studyus_images/'.$imageName;
        }

        $data = new WhystudyUs;
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        $data->image =  $imagePath;
        $data->save();
        return redirect()->route('admin.why-studyus.index')->with('message','Why Study Us Info  Created Successfully');
     }//end method

     public function edit($id){

        $data = WhystudyUs::find($id);
        return view('admin.why_study_us.edit',compact('data'));
     }

     public function update(Request $request,$id){
        $data = WhystudyUs::find($id);
        //image upload
        if($request->image){
            if(File::exists($data->image)){
                unlink($data->image);
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/why_studyus_images/'),$imageName);
            $imagePath = 'upload/why_studyus_images/'.$imageName;
        }

        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        if(!empty($request->image)){
            $data->image =  $imagePath;
        }
        $data->save();
        return redirect()->route('admin.why-studyus.index')->with('message','Why Study Us Info  Updated Successfully');
     }//end method

     public function delete($id){
        $data = WhystudyUs::find($id);

            if(File::exists($data->image)){
                unlink($data->image);
            }
        $data->delete();
        return redirect()->route('admin.why-studyus.index')->with('message','Why Study Us Info  Deleted Successfully');
     }//end method
}
