<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageChangeController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Frontend\ApplyCouponController;
use App\Http\Controllers\Frontend\CourseOrderController;
use App\Http\Controllers\Frontend\FrontContactController;


//frontend home page
Route::get('/',[FrontHomeController::class,'index']);
//course details
Route::get('/course-details/{id}/{slug}',[FrontHomeController::class,'courseDetails'])->name('course-details');

//course checkout page
Route::get('/course-checkout/{id}',[CheckoutController::class,'courseCheckout'])->name('checkout');

//course order store
Route::post('/course-order-store',[CourseOrderController::class,'courseOrderStore'])->name('course-order.store');

//coupon apply
Route::post('/apply-coupon',[ApplyCouponController::class,'applyCoupon'])->name('coupon.apply');


//contact message store
Route::post('/contact-store',[FrontContactController::class,'store'])->name('contact.store');


//language change
Route::get('/lang-eng',[LanguageChangeController::class,'english'])->name('lang.english');
Route::get('/lang-bn',[LanguageChangeController::class,'bangla'])->name('lang.bangla');
