<?php
use App\Http\Controllers\Frontend\FrontHomeController;
use Illuminate\Support\Facades\Route;


//frontend home page
Route::get('/',[FrontHomeController::class,'index']);




