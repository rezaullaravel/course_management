<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactMessageController extends Controller
{
    //view contact message
    public function index(){
        $messages = ContactUs::orderBy('id','desc')->get();
        return view('admin.contact_us.index',compact('messages'));
    }//end method

    //change message status
    public function changeMessageStatus($id){
        $message = ContactUs::find($id);
        $message->view_status = 1;
        $message->save();
        return back()->with('message','Message Viewd');
    }
}
