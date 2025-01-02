<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontHomeController extends Controller
{
    //frontend home page
    public function index(){
        return view('frontend.home');
    }//end method

    //course details
    public function courseDetails($id,$slug){
        $course = Course::find($id);
        return view('frontend.pages.course_details',compact('course'));
    }//end method

    //book details
    public function bookDetails($id,$slug){
        $book = Book::find($id);
        return view('frontend.pages.book_details',compact('book'));
    }//end method
}
