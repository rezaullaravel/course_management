<?php

namespace App\Http\Controllers\Backend;

use App\Models\Book;
use App\Models\BookOrder;
use App\Models\CourseOrder;
use App\Models\PackageOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AllOrderController extends Controller implements HasMiddleware
{
     //for role permission
     public static function middleware(): array
     {
     return [


         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-book-order'), only:['getAllOrderedBook']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('update-book-order-status'), only:['bookOrderStatusEdit','bookOrderStatusUpdate']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('read-ordered-book'), only:['readOrderedBook','bookOrderStatusUpdate']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-course-order'), only:['getAllOrderedCourse']),
         new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-package-order'), only:['getAllOrderedPackage']),
     ];
     }
    //get all ordered book
    public function getAllOrderedBook(){
        if(Auth::user()->hasRole('admin')){
            $orderedBooks = BookOrder::orderBy('id','desc')->get();
        } else {
            $orderedBooks = BookOrder::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        }

        return view('admin.order_book.index',compact('orderedBooks'));

    }//end method

    //book order status edit
    public function bookOrderStatusEdit($id){
        $data = BookOrder::find($id);
        return view('admin.order_book.edit_order_status',compact('data'));
    }//end method

    //book order status update
    public function bookOrderStatusUpdate(Request $request,$id){
        $data = BookOrder::find($id);
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.view-book-order')->with('message','Status Updated Successfully');
    }//end method

    //read ordered book
    public function readOrderedBook($book_id){
        $book = Book::where('id', $book_id)->first();

        return view('admin.order_book.read_ordered_book',compact('book'));
    }//end method

    //save pdf for read book
    public function servePdf($id)
   {
        $book = Book::findOrFail($id);

        $filePath = $book->book_pdf_file;


        // Serve the PDF file securely
        return response()->file($filePath, [
            'Content-Disposition' => 'inline', // Open in browser without download
        ]);
   }

   //view course order
   public function getAllOrderedCourse(){

    if(Auth::user()->hasRole('user')){

        $courseOrders = CourseOrder::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
    } else {
        $courseOrders = CourseOrder::orderBy('id','desc')->get();
    }

    return view('admin.order_course.index',compact('courseOrders'));
   }//end method

   //view package order
   public function getAllOrderedPackage(){
    if(Auth::user()->hasRole('user')){

        $packageOrders = PackageOrder::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
    } else {
        $packageOrders = PackageOrder::orderBy('id','desc')->get();
    }

    return view('admin.order_package.index',compact('packageOrders'));
   }//end method
}
