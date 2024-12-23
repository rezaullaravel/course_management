<?php

namespace App\Http\Controllers\Backend;

use App\Models\Book;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class BookController extends Controller implements HasMiddleware
{
    //for role permission
    public static function middleware(): array
    {
    return [


        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('view-book'), only:['index']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('create-book'), only:['create','store']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-book'), only:['edit','update']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('edit-book-status'), only:['deactiveBook','activeBook']),
        new Middleware(\Spatie\Permission\Middleware\PermissionMiddleware::using('delete-book'), only:['delete']),
    ];
    }

    //book list
    public function index(){
        if(Auth::user()->hasRole('admin')){
            $books = Book::orderBy('id','desc')->get();
        } else {
            $books = Book::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        }

        return view('admin.book.index',compact('books'));
    }//end method


     //create
     public function create(){
        $categories = Category::all();
        return view('admin.book.create',compact('categories'));

     }//end method

     //store
     public function store(Request $request){
        $request->validate([
            'category_id' =>'required',
            'title_en' => 'required|unique:books',
            'title_bn' => 'required|unique:books',
            'description_en' => 'required',
            'description_bn' => 'required',
            'image' => 'required|image',
            'book_pdf_file' => 'required|mimes:pdf',
        ],[
            'category_id.required'=>'The category field is required',
            'title_en.required'=>'The title english field is required',
            'title_bn.required'=>'The title bangla field is required',
            'description_en.required'=>'The description english field is required',
            'description_bn.required'=>'The description bangla field is required',
            'book_pdf_file.mimes' => 'The file must be a PDF',
        ]);

         //image upload
         if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/books/'),$imageName);
            $imagePath = 'upload/books/'.$imageName;
        }

        //pdf file upload
        if($request->book_pdf_file){
            $file = $request->book_pdf_file;
            $fileName = rand().'.'.$file->getClientOriginalName();
            $file->move(public_path('upload/books/'),$fileName);
            $filePath = 'upload/books/'.$fileName;
        }

         //another image upload
         if($request->another_image){
            $another_image = $request->another_image;
            $another_imageName = rand().'.'.$another_image->getClientOriginalName();
            $another_image->move(public_path('upload/books/'),$another_imageName);
            $another_imagePath = 'upload/books/'.$another_imageName;
        }

        $book = new Book();
        $book->category_id = $request->category_id;
        $book->user_id = Auth::user()->id;
        $book->title_en = $request->title_en;
        $book->title_bn = $request->title_bn;
        $book->slug = Str::slug($request->title_en);
        $book->image =   $imagePath;
        if(!empty($request->video_url)){
            $book->video_url = $request->video_url;
        }
        $book->book_pdf_file =   $filePath;
        $book->description_en = $request->description_en;
        $book->description_bn = $request->description_bn;

        if(!empty($request->topic1_en)){
            $book->topic1_en = $request->topic1_en;
        }
        if(!empty($request->topic1_bn)){
            $book->topic1_bn = $request->topic1_bn;
        }
        if(!empty($request->description1_en)){
            $book->description1_en = $request->description1_en;
        }
        if(!empty($request->description1_bn)){
            $book->description1_bn = $request->description1_bn;
        }

        if (!empty($request->topic2_en)) {
            $book->topic2_en = $request->topic2_en;
        }
        if (!empty($request->topic2_bn)) {
            $book->topic2_bn = $request->topic2_bn;
        }
        if (!empty($request->description2_en)) {
            $book->description2_en = $request->description2_en;
        }
        if (!empty($request->description2_bn)) {
            $book->description2_bn = $request->description2_bn;
        }

        if (!empty($request->topic3_en)) {
            $book->topic3_en = $request->topic3_en;
        }
        if (!empty($request->topic3_bn)) {
            $book->topic3_bn = $request->topic3_bn;
        }
        if (!empty($request->description3_en)) {
            $book->description3_en = $request->description3_en;
        }
        if (!empty($request->description3_bn)) {
            $book->description3_bn = $request->description3_bn;
        }

        if (!empty($request->topic4_en)) {
            $book->topic4_en = $request->topic4_en;
        }
        if (!empty($request->topic4_bn)) {
            $book->topic4_bn = $request->topic4_bn;
        }
        if (!empty($request->description4_en)) {
            $book->description4_en = $request->description4_en;
        }
        if (!empty($request->description4_bn)) {
            $book->description4_bn = $request->description4_bn;
        }

        if (!empty($request->topic5_en)) {
            $book->topic5_en = $request->topic5_en;
        }
        if (!empty($request->topic5_bn)) {
            $book->topic5_bn = $request->topic5_bn;
        }
        if (!empty($request->description5_en)) {
            $book->description5_en = $request->description5_en;
        }
        if (!empty($request->description5_bn)) {
            $book->description5_bn = $request->description5_bn;
        }

        if (!empty($request->topic6_en)) {
            $book->topic6_en = $request->topic6_en;
        }
        if (!empty($request->topic6_bn)) {
            $book->topic6_bn = $request->topic6_bn;
        }
        if (!empty($request->description6_en)) {
            $book->description6_en = $request->description6_en;
        }
        if (!empty($request->description6_bn)) {
            $book->description6_bn = $request->description6_bn;
        }

        if (!empty($request->topic7_en)) {
            $book->topic7_en = $request->topic7_en;
        }
        if (!empty($request->topic7_bn)) {
            $book->topic7_bn = $request->topic7_bn;
        }
        if (!empty($request->description7_en)) {
            $book->description7_en = $request->description7_en;
        }
        if (!empty($request->description7_bn)) {
            $book->description7_bn = $request->description7_bn;
        }

        if (!empty($request->topic8_en)) {
            $book->topic8_en = $request->topic8_en;
        }
        if (!empty($request->topic8_bn)) {
            $book->topic8_bn = $request->topic8_bn;
        }
        if (!empty($request->description8_en)) {
            $book->description8_en = $request->description8_en;
        }
        if (!empty($request->description8_bn)) {
            $book->description8_bn = $request->description8_bn;
        }

        if (!empty($request->topic9_en)) {
            $book->topic9_en = $request->topic9_en;
        }
        if (!empty($request->topic9_bn)) {
            $book->topic9_bn = $request->topic9_bn;
        }
        if (!empty($request->description9_en)) {
            $book->description9_en = $request->description9_en;
        }
        if (!empty($request->description9_bn)) {
            $book->description9_bn = $request->description9_bn;
        }

        if (!empty($request->topic10_en)) {
            $book->topic10_en = $request->topic10_en;
        }
        if (!empty($request->topic10_bn)) {
            $book->topic10_bn = $request->topic10_bn;
        }
        if (!empty($request->description10_en)) {
            $book->description10_en = $request->description10_en;
        }
        if (!empty($request->description10_bn)) {
            $book->description10_bn = $request->description10_bn;
        }

        if(!empty($request->price_en)){
            $book->price_en = $request->price_en;
        }

        if(!empty($request->price_bn)){
            $book->price_bn = $request->price_bn;
        }

        if(!empty($request->paid_status)){
            $book->paid_status = $request->paid_status;
        }

        if(!empty($request->another_image)){
            $book->another_image = $another_imagePath;
        }

        if(!empty($request->another_description_en)){
            $book->another_description_en = $request->another_description_en;
        }

        if(!empty($request->another_description_bn	)){
            $book->another_description_bn= $request->another_description_bn	;
        }

        if(!empty($request->footer_topic1_en)){
            $book->footer_topic1_en = $request->footer_topic1_en;
        }
        if(!empty($request->footer_topic1_bn)){
            $book->footer_topic1_bn = $request->footer_topic1_bn;
        }

        if (!empty($request->footer_topic2_en)) {
            $book->footer_topic2_en = $request->footer_topic2_en;
        }
        if (!empty($request->footer_topic2_bn)) {
            $book->footer_topic2_bn = $request->footer_topic2_bn;
        }

        if (!empty($request->footer_topic3_en)) {
            $book->footer_topic3_en = $request->footer_topic3_en;
        }
        if (!empty($request->footer_topic3_bn)) {
            $book->footer_topic3_bn = $request->footer_topic3_bn;
        }

        if (!empty($request->footer_topic4_en)) {
            $book->footer_topic4_en = $request->footer_topic4_en;
        }
        if (!empty($request->footer_topic4_bn)) {
            $book->footer_topic4_bn = $request->footer_topic4_bn;
        }

        if (!empty($request->footer_topic5_en)) {
            $book->footer_topic5_en = $request->footer_topic5_en;
        }
        if (!empty($request->footer_topic5_bn)) {
            $book->footer_topic5_bn = $request->footer_topic5_bn;
        }

        if (!empty($request->footer_topic6_en)) {
            $book->footer_topic6_en = $request->footer_topic6_en;
        }
        if (!empty($request->footer_topic6_bn)) {
            $book->footer_topic6_bn = $request->footer_topic6_bn;
        }

        if (!empty($request->footer_topic7_en)) {
            $book->footer_topic7_en = $request->footer_topic7_en;
        }
        if (!empty($request->footer_topic7_bn)) {
            $book->footer_topic7_bn = $request->footer_topic7_bn;
        }

        if (!empty($request->footer_topic8_en)) {
            $book->footer_topic8_en = $request->footer_topic8_en;
        }
        if (!empty($request->footer_topic8_bn)) {
            $book->footer_topic8_bn = $request->footer_topic8_bn;
        }

        if (!empty($request->footer_topic9_en)) {
            $book->footer_topic9_en = $request->footer_topic9_en;
        }
        if (!empty($request->footer_topic9_bn)) {
            $book->footer_topic9_bn = $request->footer_topic9_bn;
        }

        if (!empty($request->footer_topic10_en)) {
            $book->footer_topic10_en = $request->footer_topic10_en;
        }
        if (!empty($request->footer_topic10_bn)) {
            $book->footer_topic10_bn = $request->footer_topic10_bn;
        }

        $book->save();
        return redirect('admin/book/list')->with('message','Book  Inserted Successfully');
     }//end method

     //edit
     public function edit($id){
        $book = Book::find($id);
        $categories = Category::get();
        return view('admin.book.edit',compact('book','categories'));
     }//end method

     //update
     public function update(Request $request,$id){
        $request->validate([
            'category_id' =>'required',
            'title_en' => 'required|unique:books,title_en,'.$id,
            'title_bn' => 'required|unique:books,title_bn,'.$id,
            'description_en' => 'required',
            'description_bn' => 'required',
            'image' => 'nullable|image',
            'book_pdf_file' => 'nullable|mimes:pdf',
        ],[
            'category_id.required'=>'The category field is required',
            'title_en.required'=>'The title english field is required',
            'title_bn.required'=>'The title bangla field is required',
            'description_en.required'=>'The description english field is required',
            'description_bn.required'=>'The description bangla field is required',
            'book_pdf_file.mimes' => 'The file must be a PDF',
        ]);

        $book = Book::find($id);
         //image upload
         if($request->image){
            if(File::exists($book->image)){
                unlink($book->image);
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload/books/'),$imageName);
            $imagePath = 'upload/books/'.$imageName;
        }

        //pdf file upload
        if($request->book_pdf_file){
            if(File::exists($book->book_pdf_file)){
                unlink($book->book_pdf_file);
            }
            $file = $request->book_pdf_file;
            $fileName = rand().'.'.$file->getClientOriginalName();
            $file->move(public_path('upload/books/'),$fileName);
            $filePath = 'upload/books/'.$fileName;
        }

         //another image upload
         if($request->another_image){
            if(File::exists($book->another_image)){
                unlink($book->another_image);
            }
            $another_image = $request->another_image;
            $another_imageName = rand().'.'.$another_image->getClientOriginalName();
            $another_image->move(public_path('upload/books/'),$another_imageName);
            $another_imagePath = 'upload/books/'.$another_imageName;
        }

        $book->category_id = $request->category_id;
        $book->user_id = Auth::user()->id;
        $book->title_en = $request->title_en;
        $book->title_bn = $request->title_bn;
        $book->slug = $request->slug;
        if(!empty($request->image)){
            $book->image =   $imagePath;
        }

        if(!empty($request->video_url)){
            $book->video_url = $request->video_url;
        }

        if(!empty($request->book_pdf_file)){
            $book->book_pdf_file =   $filePath;
        }
        $book->description_en = $request->description_en;
        $book->description_bn = $request->description_bn;

        if(!empty($request->topic1_en)){
            $book->topic1_en = $request->topic1_en;
        }
        if(!empty($request->topic1_bn)){
            $book->topic1_bn = $request->topic1_bn;
        }
        if(!empty($request->description1_en)){
            $book->description1_en = $request->description1_en;
        }
        if(!empty($request->description1_bn)){
            $book->description1_bn = $request->description1_bn;
        }

        if (!empty($request->topic2_en)) {
            $book->topic2_en = $request->topic2_en;
        }
        if (!empty($request->topic2_bn)) {
            $book->topic2_bn = $request->topic2_bn;
        }
        if (!empty($request->description2_en)) {
            $book->description2_en = $request->description2_en;
        }
        if (!empty($request->description2_bn)) {
            $book->description2_bn = $request->description2_bn;
        }

        if (!empty($request->topic3_en)) {
            $book->topic3_en = $request->topic3_en;
        }
        if (!empty($request->topic3_bn)) {
            $book->topic3_bn = $request->topic3_bn;
        }
        if (!empty($request->description3_en)) {
            $book->description3_en = $request->description3_en;
        }
        if (!empty($request->description3_bn)) {
            $book->description3_bn = $request->description3_bn;
        }

        if (!empty($request->topic4_en)) {
            $book->topic4_en = $request->topic4_en;
        }
        if (!empty($request->topic4_bn)) {
            $book->topic4_bn = $request->topic4_bn;
        }
        if (!empty($request->description4_en)) {
            $book->description4_en = $request->description4_en;
        }
        if (!empty($request->description4_bn)) {
            $book->description4_bn = $request->description4_bn;
        }

        if (!empty($request->topic5_en)) {
            $book->topic5_en = $request->topic5_en;
        }
        if (!empty($request->topic5_bn)) {
            $book->topic5_bn = $request->topic5_bn;
        }
        if (!empty($request->description5_en)) {
            $book->description5_en = $request->description5_en;
        }
        if (!empty($request->description5_bn)) {
            $book->description5_bn = $request->description5_bn;
        }

        if (!empty($request->topic6_en)) {
            $book->topic6_en = $request->topic6_en;
        }
        if (!empty($request->topic6_bn)) {
            $book->topic6_bn = $request->topic6_bn;
        }
        if (!empty($request->description6_en)) {
            $book->description6_en = $request->description6_en;
        }
        if (!empty($request->description6_bn)) {
            $book->description6_bn = $request->description6_bn;
        }

        if (!empty($request->topic7_en)) {
            $book->topic7_en = $request->topic7_en;
        }
        if (!empty($request->topic7_bn)) {
            $book->topic7_bn = $request->topic7_bn;
        }
        if (!empty($request->description7_en)) {
            $book->description7_en = $request->description7_en;
        }
        if (!empty($request->description7_bn)) {
            $book->description7_bn = $request->description7_bn;
        }

        if (!empty($request->topic8_en)) {
            $book->topic8_en = $request->topic8_en;
        }
        if (!empty($request->topic8_bn)) {
            $book->topic8_bn = $request->topic8_bn;
        }
        if (!empty($request->description8_en)) {
            $book->description8_en = $request->description8_en;
        }
        if (!empty($request->description8_bn)) {
            $book->description8_bn = $request->description8_bn;
        }

        if (!empty($request->topic9_en)) {
            $book->topic9_en = $request->topic9_en;
        }
        if (!empty($request->topic9_bn)) {
            $book->topic9_bn = $request->topic9_bn;
        }
        if (!empty($request->description9_en)) {
            $book->description9_en = $request->description9_en;
        }
        if (!empty($request->description9_bn)) {
            $book->description9_bn = $request->description9_bn;
        }

        if (!empty($request->topic10_en)) {
            $book->topic10_en = $request->topic10_en;
        }
        if (!empty($request->topic10_bn)) {
            $book->topic10_bn = $request->topic10_bn;
        }
        if (!empty($request->description10_en)) {
            $book->description10_en = $request->description10_en;
        }
        if (!empty($request->description10_bn)) {
            $book->description10_bn = $request->description10_bn;
        }

        if(!empty($request->price_en)){
            $book->price_en = $request->price_en;
        } else {
            $book->price_en = null;
        }

        if(!empty($request->price_bn)){
            $book->price_bn = $request->price_bn;
        } else {
            $book->price_bn = null;
        }

        if(!empty($request->paid_status)){
            $book->paid_status = $request->paid_status;
        }

        if(!empty($request->another_image)){
            $book->another_image = $another_imagePath;
        }

        if(!empty($request->another_description_en)){
            $book->another_description_en = $request->another_description_en;
        }

        if(!empty($request->another_description_bn	)){
            $book->another_description_bn= $request->another_description_bn	;
        }

        if(!empty($request->footer_topic1_en)){
            $book->footer_topic1_en = $request->footer_topic1_en;
        }
        if(!empty($request->footer_topic1_bn)){
            $book->footer_topic1_bn = $request->footer_topic1_bn;
        }

        if (!empty($request->footer_topic2_en)) {
            $book->footer_topic2_en = $request->footer_topic2_en;
        }
        if (!empty($request->footer_topic2_bn)) {
            $book->footer_topic2_bn = $request->footer_topic2_bn;
        }

        if (!empty($request->footer_topic3_en)) {
            $book->footer_topic3_en = $request->footer_topic3_en;
        }
        if (!empty($request->footer_topic3_bn)) {
            $book->footer_topic3_bn = $request->footer_topic3_bn;
        }

        if (!empty($request->footer_topic4_en)) {
            $book->footer_topic4_en = $request->footer_topic4_en;
        }
        if (!empty($request->footer_topic4_bn)) {
            $book->footer_topic4_bn = $request->footer_topic4_bn;
        }

        if (!empty($request->footer_topic5_en)) {
            $book->footer_topic5_en = $request->footer_topic5_en;
        }
        if (!empty($request->footer_topic5_bn)) {
            $book->footer_topic5_bn = $request->footer_topic5_bn;
        }

        if (!empty($request->footer_topic6_en)) {
            $book->footer_topic6_en = $request->footer_topic6_en;
        }
        if (!empty($request->footer_topic6_bn)) {
            $book->footer_topic6_bn = $request->footer_topic6_bn;
        }

        if (!empty($request->footer_topic7_en)) {
            $book->footer_topic7_en = $request->footer_topic7_en;
        }
        if (!empty($request->footer_topic7_bn)) {
            $book->footer_topic7_bn = $request->footer_topic7_bn;
        }

        if (!empty($request->footer_topic8_en)) {
            $book->footer_topic8_en = $request->footer_topic8_en;
        }
        if (!empty($request->footer_topic8_bn)) {
            $book->footer_topic8_bn = $request->footer_topic8_bn;
        }

        if (!empty($request->footer_topic9_en)) {
            $book->footer_topic9_en = $request->footer_topic9_en;
        }
        if (!empty($request->footer_topic9_bn)) {
            $book->footer_topic9_bn = $request->footer_topic9_bn;
        }

        if (!empty($request->footer_topic10_en)) {
            $book->footer_topic10_en = $request->footer_topic10_en;
        }
        if (!empty($request->footer_topic10_bn)) {
            $book->footer_topic10_bn = $request->footer_topic10_bn;
        }

        $book->save();
        return redirect('admin/book/list')->with('message','Book  Updated Successfully');
     }//end method

     //delete book
     public function delete($id){
        $book = Book::find($id);


        if(File::exists($book->image)){
            unlink($book->image);
        }

        if(File::exists($book->book_pdf_file)){
            unlink($book->book_pdf_file);
        }

        if(File::exists($book->another_image)){
            unlink($book->another_image);
        }

        $book->delete();
        return redirect('admin/book/list')->with('message','Book  Deleted Successfully');

     }//end method

     //deactive book
     public function deactiveBook($id){
        $book = Book::find($id);
        $book->status = 0;

        $book->save();
        return redirect('admin/book/list')->with('message','Book  Deactivated Successfully');
     }//end method

     //active book
     public function activeBook($id){
        $book = Book::find($id);
        $book->status = 1;

        $book->save();
        return redirect('admin/book/list')->with('message','Book  Activated Successfully');
     }//end method
}
