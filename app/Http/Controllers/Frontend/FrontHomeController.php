<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
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

    //free book read
    public function bookRead($id,$slug){
        $book = Book::find($id);
        if($book->paid_status=='free'){
            return view('frontend.pages.book_read',compact('book'));
        } else {
            abort(403, 'This book is not for free.');
        }

    }//end method

    public function servePdf($id)
    {
         $book = Book::findOrFail($id);

         $filePath = $book->book_pdf_file;


         // Serve the PDF file securely
         return response()->file($filePath, [
             'Content-Disposition' => 'inline', // Open in browser without download
         ]);
    }

    //blog details
    public function blogDetails($id,$slug){
        $blog = Blog::find($id);
        return view('frontend.pages.blog_details',compact('blog'));
    }//end method
}
