<?php

namespace App\Http\Controllers\Backend;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PackageController extends Controller implements HasMiddleware
{
    //for role permission
    public static function middleware(): array
    {
    return [


        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-package'), only:['index']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-package'), only:['create','store']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-package'), only:['edit','update']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-package'), only:['delete']),
    ];
    }

    //package list
    public function index(){
            $packages = Package::orderBy('id','desc')->get();
        return view('admin.package.index',compact('packages'));
    }//end method

    //create
    public function create(){
        return view('admin.package.create');

     }//end method

     //store
     public function store(Request $request){
        $request->validate([
            'name_en'=>'required',
            'name_bn'=>'required',
            'description_en'=>'required',
            'description_bn'=>'required',
            'price_en'=>'required',
            'price_bn'=>'required',
        ]);

        $package = new Package();
        $package->name_en = $request->name_en;
        $package->name_bn = $request->name_bn;
        $package->description_en = $request->description_en;
        $package->description_bn = $request->description_bn;
        $package->price_en = $request->price_en;
        $package->price_bn = $request->price_bn;

        if(!empty($request->feature1_en)){
            $package->feature1_en = $request->feature1_en;
        }
        if(!empty($request->feature1_bn)){
            $package->feature1_bn = $request->feature1_bn;
        }

        if(!empty($request->feature1_status)){
            $package->feature1_status = $request->feature1_status;
        }

        if (!empty($request->feature2_en)) {
            $package->feature2_en = $request->feature2_en;
        }
        if (!empty($request->feature2_bn)) {
            $package->feature2_bn = $request->feature2_bn;
        }
        if (!empty($request->feature2_status)) {
            $package->feature2_status = $request->feature2_status;
        }

        if (!empty($request->feature3_en)) {
            $package->feature3_en = $request->feature3_en;
        }
        if (!empty($request->feature3_bn)) {
            $package->feature3_bn = $request->feature3_bn;
        }
        if (!empty($request->feature3_status)) {
            $package->feature3_status = $request->feature3_status;
        }

        if (!empty($request->feature4_en)) {
            $package->feature4_en = $request->feature4_en;
        }
        if (!empty($request->feature4_bn)) {
            $package->feature4_bn = $request->feature4_bn;
        }
        if (!empty($request->feature4_status)) {
            $package->feature4_status = $request->feature4_status;
        }

        if (!empty($request->feature5_en)) {
            $package->feature5_en = $request->feature5_en;
        }
        if (!empty($request->feature5_bn)) {
            $package->feature5_bn = $request->feature5_bn;
        }
        if (!empty($request->feature5_status)) {
            $package->feature5_status = $request->feature5_status;
        }

        if (!empty($request->feature6_en)) {
            $package->feature6_en = $request->feature6_en;
        }
        if (!empty($request->feature6_bn)) {
            $package->feature6_bn = $request->feature6_bn;
        }
        if (!empty($request->feature6_status)) {
            $package->feature6_status = $request->feature6_status;
        }

        if (!empty($request->feature7_en)) {
            $package->feature7_en = $request->feature7_en;
        }
        if (!empty($request->feature7_bn)) {
            $package->feature7_bn = $request->feature7_bn;
        }
        if (!empty($request->feature7_status)) {
            $package->feature7_status = $request->feature7_status;
        }

        if (!empty($request->feature8_en)) {
            $package->feature8_en = $request->feature8_en;
        }
        if (!empty($request->feature8_bn)) {
            $package->feature8_bn = $request->feature8_bn;
        }
        if (!empty($request->feature8_status)) {
            $package->feature8_status = $request->feature8_status;
        }

        if (!empty($request->feature9_en)) {
            $package->feature9_en = $request->feature9_en;
        }
        if (!empty($request->feature9_bn)) {
            $package->feature9_bn = $request->feature9_bn;
        }
        if (!empty($request->feature9_status)) {
            $package->feature9_status = $request->feature9_status;
        }

        if (!empty($request->feature10_en)) {
            $package->feature10_en = $request->feature10_en;
        }
        if (!empty($request->feature10_bn)) {
            $package->feature10_bn = $request->feature10_bn;
        }
        if (!empty($request->feature10_status)) {
            $package->feature10_status = $request->feature10_status;
        }

        $package->save();
        return redirect('admin/package/list')->with('message','Package  Created Successfully');

     }//end method

     //edit
     public function edit($id){
        $package = Package::find($id);
        return view('admin.package.edit',compact('package'));
     }//end method

     //update
     public function update(Request $request,$id){
        $request->validate([
            'name_en'=>'required',
            'name_bn'=>'required',
            'description_en'=>'required',
            'description_bn'=>'required',
            'price_en'=>'required',
            'price_bn'=>'required',
        ]);

        $package = Package::find($id);
        $package->name_en = $request->name_en;
        $package->name_bn = $request->name_bn;
        $package->description_en = $request->description_en;
        $package->description_bn = $request->description_bn;
        $package->price_en = $request->price_en;
        $package->price_bn = $request->price_bn;

        if(!empty($request->feature1_en)){
            $package->feature1_en = $request->feature1_en;
        }
        if(!empty($request->feature1_bn)){
            $package->feature1_bn = $request->feature1_bn;
        }

        if(!empty($request->feature1_status)){
            $package->feature1_status = $request->feature1_status;
        }

        if (!empty($request->feature2_en)) {
            $package->feature2_en = $request->feature2_en;
        }
        if (!empty($request->feature2_bn)) {
            $package->feature2_bn = $request->feature2_bn;
        }
        if (!empty($request->feature2_status)) {
            $package->feature2_status = $request->feature2_status;
        }

        if (!empty($request->feature3_en)) {
            $package->feature3_en = $request->feature3_en;
        }
        if (!empty($request->feature3_bn)) {
            $package->feature3_bn = $request->feature3_bn;
        }
        if (!empty($request->feature3_status)) {
            $package->feature3_status = $request->feature3_status;
        }

        if (!empty($request->feature4_en)) {
            $package->feature4_en = $request->feature4_en;
        }
        if (!empty($request->feature4_bn)) {
            $package->feature4_bn = $request->feature4_bn;
        }
        if (!empty($request->feature4_status)) {
            $package->feature4_status = $request->feature4_status;
        }

        if (!empty($request->feature5_en)) {
            $package->feature5_en = $request->feature5_en;
        }
        if (!empty($request->feature5_bn)) {
            $package->feature5_bn = $request->feature5_bn;
        }
        if (!empty($request->feature5_status)) {
            $package->feature5_status = $request->feature5_status;
        }

        if (!empty($request->feature6_en)) {
            $package->feature6_en = $request->feature6_en;
        }
        if (!empty($request->feature6_bn)) {
            $package->feature6_bn = $request->feature6_bn;
        }
        if (!empty($request->feature6_status)) {
            $package->feature6_status = $request->feature6_status;
        }

        if (!empty($request->feature7_en)) {
            $package->feature7_en = $request->feature7_en;
        }
        if (!empty($request->feature7_bn)) {
            $package->feature7_bn = $request->feature7_bn;
        }
        if (!empty($request->feature7_status)) {
            $package->feature7_status = $request->feature7_status;
        }

        if (!empty($request->feature8_en)) {
            $package->feature8_en = $request->feature8_en;
        }
        if (!empty($request->feature8_bn)) {
            $package->feature8_bn = $request->feature8_bn;
        }
        if (!empty($request->feature8_status)) {
            $package->feature8_status = $request->feature8_status;
        }

        if (!empty($request->feature9_en)) {
            $package->feature9_en = $request->feature9_en;
        }
        if (!empty($request->feature9_bn)) {
            $package->feature9_bn = $request->feature9_bn;
        }
        if (!empty($request->feature9_status)) {
            $package->feature9_status = $request->feature9_status;
        }

        if (!empty($request->feature10_en)) {
            $package->feature10_en = $request->feature10_en;
        }
        if (!empty($request->feature10_bn)) {
            $package->feature10_bn = $request->feature10_bn;
        }
        if (!empty($request->feature10_status)) {
            $package->feature10_status = $request->feature10_status;
        }

        $package->save();
        return redirect('admin/package/list')->with('message','Package  Updated Successfully');
     }//end method

     //delete
     public function delete($id){
        Package::find($id)->delete();
        return redirect('admin/package/list')->with('message','Package  Deleted Successfully');
     }//end method
}
