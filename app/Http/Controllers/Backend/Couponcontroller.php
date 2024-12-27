<?php

namespace App\Http\Controllers\Backend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class Couponcontroller extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-coupon'), only:['index']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-coupon'), only:['create','store']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-coupon'), only:['edit','update']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-coupon'), only:['delete']),
     ];
     }

     //coupon list
     public function index(){
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('admin.coupon.index',compact('coupons'));
    }//end method

    //coupon create
    public function create(){
        return view('admin.coupon.create');
   }//end method

   //store
   public function store(Request $request){
    $coupon = new Coupon();
    $coupon->code = $request->code;
    $coupon->discount_amount_en = $request->discount_amount_en;
    $coupon->discount_amount_bn = $request->discount_amount_bn;
    $coupon->validity = date('d-m-Y',strtotime($request->validity));
    $coupon->save();
    return redirect('admin/coupon/list')->with('message','Coupon Created Successfully');
   }//end method

   //edit
   public function edit($id){
    $coupon = Coupon::find($id);
    return view('admin.coupon.edit',compact('coupon'));
}//end method

//update
public function update(Request $request,$id){
    $coupon = Coupon::find($id);
    $coupon->code = $request->code;
    $coupon->discount_amount_en = $request->discount_amount_en;
    $coupon->discount_amount_bn = $request->discount_amount_bn;
    $coupon->validity = date('d-m-Y',strtotime($request->validity));
    $coupon->save();
    return redirect('admin/coupon/list')->with('message','Coupon Updated Successfully');
   }//end method

   //delete
   public function delete($id){
     Coupon::find($id)->delete();
     return redirect('admin/coupon/list')->with('message','Coupon Deleted Successfully');
     }//end method
}
