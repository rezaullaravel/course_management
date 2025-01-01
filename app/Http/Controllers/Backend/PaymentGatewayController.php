<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\PaymentGateway;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PaymentGatewayController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('payment-gatway'), only:['paymentGateway']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-blog'), only:['delete']),
     ];
     }

     //payment gateway
     public function paymentGateway(){
        $aamarpay = PaymentGateway::first();
      return view('admin.payment_gateway.edit',compact('aamarpay'));
     }//end method

     //aamarpay update
     public function aamarpayUpdate(Request $request,$id){
        $aamarpay = PaymentGateway::find($id);
        $aamarpay->store_id = $request->store_id;
        $aamarpay->signature_key = $request->signature_key;
        $aamarpay->status = $request->status;
        $aamarpay->save();
        return redirect()->back()->with('message','AamarPay info updated successfully');
     }//end method
}
