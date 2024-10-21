<?php
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Frontend\FrontHomeController;
use Illuminate\Support\Facades\Route;


//frontend home page
Route::get('/',[FrontHomeController::class,'index']);

/*=====================user admin authentication========================== */
Route::get('/login',[UserAuthController::class,'index']);
Route::post('/login',[UserAuthController::class,'login'])->name('user.post.login');


Route::middleware('admin')->group(function(){
    //admin dashboard
    Route::get('admin/dashboard',[UserAuthController::class,'adminDashboard']);
    //admin logout
    Route::get('admin/logout',[UserAuthController::class,'adminLogout'])->name('admin.logout');
});


Route::middleware('user')->group(function(){
//user dashboard
Route::get('user/dashboard',[UserAuthController::class,'userDashboard']);
//user logout
Route::get('user/logout',[UserAuthController::class,'logout'])->name('user.logout');
});
/*=====================user admin authentication========================== */


