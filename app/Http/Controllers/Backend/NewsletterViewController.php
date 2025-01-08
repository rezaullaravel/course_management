<?php

namespace App\Http\Controllers\Backend;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterViewController extends Controller
{
    //newsletter list
    public function newsletterList(){
        $newsletters = Newsletter::orderBy('id','desc')->get();
        return view('admin.join_us.index',compact('newsletters'));
    }//end method
}
