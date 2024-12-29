<?php

namespace App\Http\Controllers\Frontend;

use App\Models\UserInfo;
use App\Models\CourseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseOrderController extends Controller
{
    public function courseOrderStore(Request $request){
        $order = new CourseOrder();
        $order->user_id = Auth::user()->id;
        $order->course_id = $request->course_id;
        $order->total_bn = $request->total;
        $order->price_bn = $request->price_bn;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->country = $request->country;
        $order->location = $request->location;
        $order->payment_method = $request->payment_method;
        $order->status = 'pending';
        $order->save();

         // Save info for future checkout if the checkbox is checked
        if ($request->has('save_info')) {
            UserInfo::updateOrCreate(
                ['user_id' => auth()->id()], // Match by user_id
                [
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'country' => $request->country,
                    'location' => $request->location,
                ]
            );
        }

        //coupon destroy
        if(Session::get('discount_amount_bn')){
            Session::forget('discount_amount_bn');
           }


        $message = 'আপনার অর্ডার সফলভাবে সাবমিট হয়েছে।';

       return redirect('/')->with('message', $message );
    }//end method
}
