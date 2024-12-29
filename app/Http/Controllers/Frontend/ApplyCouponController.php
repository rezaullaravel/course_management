<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ApplyCouponController extends Controller
{
    public function applyCoupon(Request $request){
        $coupon = Coupon::where('code',$request->code)->first();
        if($coupon){
            if (Carbon::now()->gt(\Carbon\Carbon::parse($coupon->validity))){
                $message = 'আপনার দেওয়া কুপন কোডের মেয়াদ শেষ হয়ে গেছে।';
                return redirect()->back()->with('error_message', $message);
            }

        else{
            Session::put('discount_amount_bn',$coupon->discount_amount_bn);
            $message = 'কুপন সফলভাবে এপ্লাই হয়েছে।';
            return redirect()->back()->with('success_message', $message);
        }


        } else {
            $message = 'আপনার কুপন কোডটি সঠিক নয়। দয়া করে সঠিক কোড ব্যবহার করন।';
            return redirect()->back()->with('error_message', $message);
        }
    }//end method
}
