<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageChangeController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Frontend\FrontContactController;


//frontend home page
Route::get('/',[FrontHomeController::class,'index']);




//contact message store
Route::post('/contact-store',[FrontContactController::class,'store'])->name('contact.store');


//language change
Route::get('/lang-eng',[LanguageChangeController::class,'english'])->name('lang.english');
Route::get('/lang-bn',[LanguageChangeController::class,'bangla'])->name('lang.bangla');
