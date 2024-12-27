<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageChangeController extends Controller
{
    public function english(){
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang','english');
        return redirect()->back();
    }

    public function bangla(){
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang','bangla');
        return redirect()->back();
    }
}
