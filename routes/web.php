<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Frontend\FrontContactController;


//frontend home page
Route::get('/',[FrontHomeController::class,'index']);




//contact message store
Route::post('/contact-store',[FrontContactController::class,'store'])->name('contact.store');
