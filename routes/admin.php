<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('welcome', function(){
    return "welcome";
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify'=>true]);

Route::middleware('verified')->group( function () {
    //Cars
    Route::get('cars', [CarController::class, 'index'])->name('cars');
    Route::get('addcar', [CarController::class, 'create'])->name('addcar');
    Route::post('storeCar', [CarController::class, 'store'])->name('storeCar');
    Route::get('editcar/{id}', [CarController::class, 'edit'])->name('editcar');
    Route::put('updatecar/{id}', [CarController::class, 'update'])->name('updatecar');
    Route::get('deletecar/{id}', [CarController::class, 'destroy'])->name('deletecar');
    
    //Categories
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('addcategory', [CategoryController::class, 'create'])->name('addcategory');
    Route::post('storecategory', [CategoryController::class, 'store'])->name('storecategory');
    Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');
    Route::put('updatecategory/{id}', [CategoryController::class, 'update'])->name('updatecategory');
    Route::get('deletecategory/{id}', [CategoryController::class, 'destroy'])->name('deletecategory');
    
    //testimoinals
    Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('addtestimonial', [TestimonialController::class, 'create'])->name('addtestimonial');
    Route::post('storetestimonial', [TestimonialController::class, 'store'])->name('storetestimonial');
    Route::get('edittestimonial/{id}', [TestimonialController::class, 'edit'])->name('edittestimonial');
    Route::put('updatetestimonial/{id}', [TestimonialController::class, 'update'])->name('updatetestimonial');
    Route::get('deletetestimonial/{id}', [TestimonialController::class, 'destroy'])->name('deletetestimonial');

   //users
   Route::get('user', [UserController::class, 'index'])->name('user');
   Route::get('adduser', [UserController::class, 'create'])->name('adduser');
   Route::post('storeuser', [UserController::class, 'store'])->name('storeuser');
   Route::get('edituser/{id}', [UserController::class, 'edit'])->name('edituser');
   Route::put('updateuser/{id}',[UserController::class, 'update'])->name('updateuser');
   
   //messages
   Route::get('message', [MessageController::class, 'index'])->name('message');
   Route::get('showmessage/{id}', [MessageController::class, 'show'])->name('showmessage');
   Route::get('deletemessage/{id}', [MessageController::class, 'destroy'])->name('deletemessage');
   Route::get('unreadmessage',[MessageController::class,'unread'])->name('unreadmessage');

   
});