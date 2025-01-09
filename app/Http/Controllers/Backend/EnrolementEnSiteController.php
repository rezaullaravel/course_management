<?php

namespace App\Http\Controllers\Backend;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class EnrolementEnSiteController extends Controller implements HasMiddleware
{
    //for role permission
    public static function middleware(): array
    {
    return [


        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('english-site-enrolment-view'), only:['index']),

    ];
    }

    //view english site enrolement
    public function index(){
       $data = Enrollment::orderBy('id','desc')->get();
       return view('admin.enrolement_en.index',compact('data'));
    }
}
