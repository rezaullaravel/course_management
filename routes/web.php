<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\LanguageChangeController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Frontend\ApplyCouponController;
use App\Http\Controllers\Frontend\FrontContactController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;



//frontend home page
Route::get('/',[FrontHomeController::class,'index']);
//course details
Route::get('/course-details/{id}/{slug}',[FrontHomeController::class,'courseDetails'])->name('course-details');

//course checkout page
Route::get('/course-checkout/{id}',[CheckoutController::class,'courseCheckout'])->name('checkout');

//course order store
Route::post('/course-order-store',[OrderController::class,'courseOrderStore'])->name('course-order.store');

//package checkout page
Route::get('/package-checkout/{id}',[CheckoutController::class,'packageCheckout'])->name('package.checkout');
//package order store
Route::post('/package-order-store',[OrderController::class,'packageOrderStore'])->name('package-order.store');

//ebook details
Route::get('/book-details/{id}/{slug}',[FrontHomeController::class,'bookDetails'])->name('book.details');

//aamarpay payment gateway
//for course
Route::post('/payment-success', [OrderController::class,'success'])->name('payment.success')->withoutMiddleware([VerifyCsrfToken::class]);
//for package
Route::post('/package-payment-success', [OrderController::class,'successPackage'])->name('package.payment.success')->withoutMiddleware([VerifyCsrfToken::class]);
Route::post('/fail', [OrderController::class,'fail'])->withoutMiddleware([VerifyCsrfToken::class])->name('fail');
Route::post('/cancel', [OrderController::class,'cancel'])->withoutMiddleware([VerifyCsrfToken::class])->name('cancel');

//coupon apply
Route::post('/apply-coupon',[ApplyCouponController::class,'applyCoupon'])->name('coupon.apply');


//contact message store
Route::post('/contact-store',[FrontContactController::class,'store'])->name('contact.store');


//language change
Route::get('/lang-eng',[LanguageChangeController::class,'english'])->name('lang.english');
Route::get('/lang-bn',[LanguageChangeController::class,'bangla'])->name('lang.bangla');
