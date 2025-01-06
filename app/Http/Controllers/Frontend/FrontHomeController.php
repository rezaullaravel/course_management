<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Book;
use App\Models\User;
use App\Models\Course;
use App\Models\AboutUs;
use App\Models\Package;
use App\Models\Category;
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

    //all course
    public function allCourse(){
        $courses = Course::orderBy('id','desc')->where('status',1)->paginate(20);
        return view('frontend.pages.course_all',compact('courses'));
    }//end method

    //all book
    public function allBook(){
        $books = Book::orderBy('id','desc')->where('status',1)->paginate(20);
        return view('frontend.pages.book_all',compact('books'));
    }//end method


    //all blog
    public function allBlog(){
        $blogs = Blog::orderBy('id','desc')->where('status',1)->paginate(20);
        return view('frontend.pages.blog_all',compact('blogs'));
    }//end method

    //all teacher
    public function allTeacher(){
        $teachers = User::role('teacher')->get();
        return view('frontend.pages.teacher_all',compact('teachers'));
    }//end method

    //package/membership pricing
    public function pricing(){
        $packages = Package::orderBy('id','desc')->get();
        return view('frontend.pages.package_all',compact('packages'));
    }

    //category wise course
    public function categoryWiseCourse($category_id,$slug){
        $category = Category::where('id',$category_id)->first();
        $courses = Course::where('course_category_id',$category_id)->paginate(20);
        return view('frontend.pages.category_wise_course',compact('courses','category'));
    }//end method

    //about us
    public function aboutUs(){
        $about = AboutUs::first();
        return view('frontend.pages.about_us',compact('about'));
    }//end method

    //contact us
    public function contactUs(){
        return view('frontend.pages.contact_us');
    }
}
