<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\CourseCategoryController;


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

    //blog category
    Route::get('blog/category/list',[BlogCategoryController::class,'index'])->name('admin.blog-category.index');
    Route::get('blog/category/create',[BlogCategoryController::class,'create'])->name('admin.blog-category.create');
    Route::post('blog/category/store',[BlogCategoryController::class,'store'])->name('admin.blog-category.store');
    Route::get('blog/category/edit/{id}',[BlogCategoryController::class,'edit'])->name('admin.blog-category.edit');
    Route::post('blog/category/update/{id}',[BlogCategoryController::class,'update'])->name('admin.blog-category.update');
    Route::get('blog/category/delete/{id}',[BlogCategoryController::class,'delete'])->name('admin.blog-category.delete');

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


      //course category
      Route::get('course/category/list',[CourseCategoryController::class,'index'])->name('admin.course-category.index');
      Route::get('course/category/create',[CourseCategoryController::class,'create'])->name('admin.course-category.create');
      Route::post('course/category/store',[CourseCategoryController::class,'store'])->name('admin.course-category.store');
      Route::get('course/category/edit/{id}',[CourseCategoryController::class,'edit'])->name('admin.course-category.edit');
      Route::post('course/category/update/{id}',[CourseCategoryController::class,'update'])->name('admin.course-category.update');
      Route::get('course/category/delete/{id}',[CourseCategoryController::class,'delete'])->name('admin.course-category.delete');

      //course
      Route::get('course/post/list',[CourseController::class,'index'])->name('admin.course-post.index');
      Route::get('course/post/create',[CourseController::class,'create'])->name('admin.course-post.create');
      Route::post('course/post/store',[CourseController::class,'store'])->name('admin.course-post.store');
      Route::get('course/post/deactive/{id}',[CourseController::class,'deactiveCourse'])->name('admin.course-post.deactive');
     Route::get('course/post/active/{id}',[CourseController::class,'activeCourse'])->name('admin.course-post.active');
     Route::get('course/post/edit/{id}',[CourseController::class,'edit'])->name('admin.course-post.edit');
     Route::post('course/post/update/{id}',[CourseController::class,'update'])->name('admin.course-post.update');
     Route::get('course/post/delete/{id}',[CourseController::class,'delete'])->name('admin.course-post.delete');

});
/*=====================admin panel route end ========================== */
