<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    //store
    public function store(Request $request){
        $request->validate([
            'email_or_phone'=>'required',
        ]);

        $check = Newsletter::where('email_or_phone',$request->email_or_phone)->first();

        if($check){
            if(session()->get('lang') == 'bangla'){
                $message = 'আপনি অলরেডি সাবস্ক্রাইব করেছেন';
            } else {
                $message = 'You have already subscribed';
            }
            return back()->with('error','You have already subscribed.');
        } else {
            $object = new Newsletter;
            $object->email_or_phone = $request->email_or_phone;
            $object->save();

            if(session()->get('lang') == 'bangla'){
                $message = 'সাবস্ক্রিপশন সফলভাবে সম্পন্ন হয়েছে';
            } else {
                $message = 'Subscription added successfully';
            }
            return back()->with('message', $message);
        }
    }//end method
}
