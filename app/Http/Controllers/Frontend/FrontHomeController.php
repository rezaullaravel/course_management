<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    //frontend home page
    public function index(){
        return view('frontend.home');
    }//end method
}
