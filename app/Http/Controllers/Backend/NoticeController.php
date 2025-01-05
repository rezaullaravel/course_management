<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use App\Models\Notice;
use App\Models\CourseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class NoticeController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [

         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-notice'), only:['index']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-notice'), only:['create','store']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-notice'), only:['delete']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('class-link'), only:['classLink']),
     ];
     }

     //notice list
     public function index(){
        $notices = Notice::orderBy('id','desc')->get();
        return view('admin.notice.index',compact('notices'));
     }

     //notice create
     public function create(){
        $courses = Course::select('id','title_en','title_bn')->get();
        return view('admin.notice.create',compact('courses'));
     }

     //notice store
     public function store(Request $request){
        $notice = new Notice;
        $notice->course_id = $request->course_id;

        if(!empty($request->class_link)){
            $notice->class_link = $request->class_link;
        }
        if(!empty($request->content)){
            $notice->content = $request->content;
        }
        $notice->date = $request->date;
        $notice->save();
        return redirect()->route('admin.notice.index')->with('message','Notice created successfully');
     }//end method

     //notice delete
     public function delete($id){
        Notice::find($id)->delete();
        return redirect()->route('admin.notice.index')->with('message','Notice deleted successfully');
     }

     //class link
     public function classLink(){
        $orderdCourses = CourseOrder::where('user_id',Auth::user()->id)->get();
        return view('admin.class_link.index',compact('orderdCourses'));
     }
}
