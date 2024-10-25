<?php
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Route;


//frontend home page
Route::get('/',[FrontHomeController::class,'index']);

/*=====================user admin authentication========================== */
Route::get('/login',[UserAuthController::class,'index']);
Route::post('/login',[UserAuthController::class,'login'])->name('user.post.login');


Route::middleware('admin')->prefix('admin')->group(function(){
    //admin/user dashboard
    Route::get('dashboard',[UserAuthController::class,'adminDashboard']);
    //admin/user logout
    Route::get('logout',[UserAuthController::class,'adminLogout'])->name('admin.logout');
});

/*=====================user admin authentication end========================== */

/*=====================admin panel route========================== */
Route::middleware('admin')->prefix('admin')->group(function(){
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
});
/*=====================admin panel route end ========================== */


