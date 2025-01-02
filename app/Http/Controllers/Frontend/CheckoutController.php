<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Course;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //course checkout
    public function courseCheckout($id){
        if(Auth::check()){
            if(session()->get('lang')=='bangla'){
                $course = Course::find($id);
            return view('frontend.pages.course_checkout',compact('course'));
            } else {
                abort(404, 'Page not available in the selected language.');
            }

        } else {
            $previous_url =  Session::put('previous_url',url()->previous());
            return redirect('/login');
        }
    }//end method

    //package checkout
    public function packageCheckout($id){
        if(Auth::check()){
            if(session()->get('lang')=='bangla'){
                $package = Package::find($id);
            return view('frontend.pages.package_checkout',compact('package'));
            } else {
                abort(404, 'Page not available in the selected language.');
            }

        } else {
            $previous_url =  Session::put('previous_url',url()->previous());
            return redirect('/login');
        }
    }//end method
}
