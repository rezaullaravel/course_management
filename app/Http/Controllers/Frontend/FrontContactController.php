<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontContactController extends Controller
{
    //store contact message
    public function storeContactMessage(Request $request){
        $contact = new ContactUs();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        if (session()->get('lang') == 'bangla') {
            $message = 'আপনার বার্তাটি সফলভাবে পাঠানো হয়েছে';
        } else {
            $message = 'Your message has been sent successfully';
        }
        return redirect()->back()->with('success_message',$message);
    }//end method
}
