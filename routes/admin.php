<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Backend\Couponcontroller;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\AllOrderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\WhystudyUsController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\CourseCategoryController;
use App\Http\Controllers\Backend\PaymentGatewayController;


/*=====================user admin authentication========================== */
Route::get('/login',[UserAuthController::class,'index']);
Route::post('/login',[UserAuthController::class,'login'])->name('user.post.login');


Route::middleware('admin')->prefix('user')->group(function(){
    //admin/user dashboard
    Route::get('dashboard',[UserAuthController::class,'userDashboard']);
    //admin/user logout
    Route::get('logout',[UserAuthController::class,'userLogout'])->name('user.logout');
});

/*=====================user admin authentication end========================== */

/*=====================admin panel route========================== */
Route::middleware('admin')->prefix('admin')->group(function(){
    //user
    Route::get('user/list',[UserController::class,'index'])->name('admin.user.index');
    Route::get('user/create',[UserController::class,'create'])->name('admin.user.create');
    Route::post('user/store',[UserController::class,'store'])->name('admin.user.store');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.user.update');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.user.delete');

    //permission
    Route::get('permission/list',[PermissionController::class,'index'])->name('admin.permission.index');
    Route::get('permission/create',[PermissionController::class,'create'])->name('admin.permission.create');
    Route::post('permission/store',[PermissionController::class,'store'])->name('admin.permission.store');
    Route::get('permission/edit/{id}',[PermissionController::class,'edit'])->name('admin.permission.edit');
    Route::post('permission/update/{id}',[PermissionController::class,'update'])->name('admin.permission.update');
    Route::get('permission/delete/{id}',[PermissionController::class,'delete'])->name('admin.permission.delete');

    //role
    Route::get('role/list',[RoleController::class,'index'])->name('admin.role.index');
    Route::get('role/create',[RoleController::class,'create'])->name('admin.role.create');
    Route::post('role/store',[RoleController::class,'store'])->name('admin.role.store');
    Route::get('role/edit/{id}',[RoleController::class,'edit'])->name('admin.role.edit');
    Route::post('role/update/{id}',[RoleController::class,'update'])->name('admin.role.update');
    Route::get('role/delete/{id}',[RoleController::class,'delete'])->name('admin.role.delete');

    //category
    Route::get('category/list',[CategoryController::class,'index'])->name('admin.category.index');
    Route::get('category/create',[CategoryController::class,'create'])->name('admin.category.create');
    Route::post('category/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
    Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');

    //blog
    Route::get('blog/post/list',[BlogController::class,'index'])->name('admin.blog-post.index');
    Route::get('blog/post/create',[BlogController::class,'create'])->name('admin.blog-post.create');
    Route::post('blog/post/store',[BlogController::class,'store'])->name('admin.blog-post.store');
    Route::get('blog/post/edit/{id}',[BlogController::class,'edit'])->name('admin.blog-post.edit');
     Route::post('blog/post/update/{id}',[BlogController::class,'update'])->name('admin.blog-post.update');
     Route::get('blog/post/delete/{id}',[BlogController::class,'delete'])->name('admin.blog-post.delete');

     Route::get('blog/post/deactive/{id}',[BlogController::class,'deactiveBlog'])->name('admin.blog-post.deactive');
     Route::get('blog/post/active/{id}',[BlogController::class,'activeBlog'])->name('admin.blog-post.active');

      Route::post('/ckeditor/upload', [BlogController::class, 'uploadCkeditor'])->name('ckeditor.upload');



      //course
      Route::get('course/post/list',[CourseController::class,'index'])->name('admin.course-post.index');
      Route::get('course/post/create',[CourseController::class,'create'])->name('admin.course-post.create');
      Route::post('course/post/store',[CourseController::class,'store'])->name('admin.course-post.store');
      Route::get('course/post/deactive/{id}',[CourseController::class,'deactiveCourse'])->name('admin.course-post.deactive');
     Route::get('course/post/active/{id}',[CourseController::class,'activeCourse'])->name('admin.course-post.active');
     Route::get('course/post/edit/{id}',[CourseController::class,'edit'])->name('admin.course-post.edit');
     Route::post('course/post/update/{id}',[CourseController::class,'update'])->name('admin.course-post.update');
     Route::get('course/post/delete/{id}',[CourseController::class,'delete'])->name('admin.course-post.delete');

     //book
     Route::get('book/list',[BookController::class,'index'])->name('admin.book.index');
      Route::get('book/create',[BookController::class,'create'])->name('admin.book.create');
      Route::post('book/store',[BookController::class,'store'])->name('admin.book.store');
      Route::get('book/deactive/{id}',[BookController::class,'deactiveBook'])->name('admin.book.deactive');
     Route::get('book/active/{id}',[BookController::class,'activeBook'])->name('admin.book.active');
     Route::get('book/edit/{id}',[BookController::class,'edit'])->name('admin.book.edit');
     Route::post('book/update/{id}',[BookController::class,'update'])->name('admin.book.update');
     Route::get('book/delete/{id}',[BookController::class,'delete'])->name('admin.book.delete');

     //package
     Route::get('package/list',[PackageController::class,'index'])->name('admin.package.index');
      Route::get('package/create',[PackageController::class,'create'])->name('admin.package.create');
      Route::post('package/store',[PackageController::class,'store'])->name('admin.package.store');
      Route::get('package/edit/{id}',[PackageController::class,'edit'])->name('admin.package.edit');
     Route::post('package/update/{id}',[PackageController::class,'update'])->name('admin.package.update');
     Route::get('package/delete/{id}',[PackageController::class,'delete'])->name('admin.package.delete');

     //about us
     Route::get('about-us/list',[AboutUsController::class,'index'])->name('admin.about-us.index');
      Route::get('about-us/create',[AboutUsController::class,'create'])->name('admin.about-us.create');
      Route::post('about-us/store',[AboutUsController::class,'store'])->name('admin.about-us.store');
      Route::get('about-us/edit/{id}',[AboutUsController::class,'edit'])->name('admin.about-us.edit');
     Route::post('about-us/update/{id}',[AboutUsController::class,'update'])->name('admin.about-us.update');
     Route::get('about-us/delete/{id}',[AboutUsController::class,'delete'])->name('admin.about-us.delete');

     //why study us
     Route::get('why-studyus/list',[WhystudyUsController::class,'index'])->name('admin.why-studyus.index');
     Route::get('why-studyus/create',[WhystudyUsController::class,'create'])->name('admin.why-studyus.create');
     Route::post('why-studyus/store',[WhystudyUsController::class,'store'])->name('admin.why-studyus.store');
     Route::get('why-studyus/edit/{id}',[WhystudyUsController::class,'edit'])->name('admin.why-studyus.edit');
    Route::post('why-studyus/update/{id}',[WhystudyUsController::class,'update'])->name('admin.why-studyus.update');
    Route::get('why-studyus/delete/{id}',[WhystudyUsController::class,'delete'])->name('admin.why-studyus.delete');

     //testimonial
     Route::get('testimonial/list',[TestimonialController::class,'index'])->name('admin.testimonial.index');
      Route::get('testimonial/create',[TestimonialController::class,'create'])->name('admin.testimonial.create');
      Route::post('testimonial/store',[TestimonialController::class,'store'])->name('admin.testimonial.store');
      Route::get('testimonial/edit/{id}',[TestimonialController::class,'edit'])->name('admin.testimonial.edit');
     Route::post('testimonial/update/{id}',[TestimonialController::class,'update'])->name('admin.testimonial.update');
     Route::get('testimonial/delete/{id}',[TestimonialController::class,'delete'])->name('admin.testimonial.delete');

     //coupon
     Route::get('coupon/list',[Couponcontroller::class,'index'])->name('admin.coupon.index');
      Route::get('coupon/create',[Couponcontroller::class,'create'])->name('admin.coupon.create');
      Route::post('coupon/store',[Couponcontroller::class,'store'])->name('admin.coupon.store');
      Route::get('coupon/edit/{id}',[Couponcontroller::class,'edit'])->name('admin.coupon.edit');
     Route::post('coupon/update/{id}',[Couponcontroller::class,'update'])->name('admin.coupon.update');
     Route::get('coupon/delete/{id}',[Couponcontroller::class,'delete'])->name('admin.coupon.delete');

     //view contact message
     Route::get('/view-contact-message',[ContactMessageController::class,'index'])->name('admin.view-contact-message');
     Route::get('/change-contact-message-status/{id}',[ContactMessageController::class,'changeMessageStatus'])->name('admin.message-status-change');

     //payment gateway
     Route::get('payment-gateway',[PaymentGatewayController::class,'paymentGateway'])->name('admin.payment-gateway');
     Route::post('aamarpay-update/{id}',[PaymentGatewayController::class,'aamarpayUpdate'])->name('admin.aamarpay.update');

     //===============all order========================================

     //book order
     Route::get('/view-ordered-book',[AllOrderController::class,'getAllOrderedBook'])->name('admin.view-book-order');
     Route::get('/book-order-status-edit/{id}',[AllOrderController::class,'bookOrderStatusEdit'])->name('admin.book-order-status.edit');
     Route::post('/book-order-status-update/{id}',[AllOrderController::class,'bookOrderStatusUpdate'])->name('admin.book-order-status.update');
     Route::get('/read-ordered-book/{book_id}',[AllOrderController::class,'readOrderedBook'])->name('admin.read.ordered-book');
     Route::get('/books/secure-pdf/{id}', [AllOrderController::class, 'servePdf'])->name('books.secure-pdf');

     //course order
     Route::get('/view-ordered-course',[AllOrderController::class,'getAllOrderedCourse'])->name('admin.view-course-order');

     //package order
     Route::get('/view-ordered-package',[AllOrderController::class,'getAllOrderedPackage'])->name('admin.view-package-order');

     //===============all order========================================

     //notice
     Route::get('notice/list',[NoticeController::class,'index'])->name('admin.notice.index');
     Route::get('notice/create',[NoticeController::class,'create'])->name('admin.notice.create');
     Route::post('notice/store',[NoticeController::class,'store'])->name('admin.notice.store');
     Route::get('notice/delete/{id}',[NoticeController::class,'delete'])->name('admin.notice.delete');

     //class link
     Route::get('class-link',[NoticeController::class,'classLink'])->name('user.class-link');
});
/*=====================admin panel route end ========================== */
