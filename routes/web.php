<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::fallback(MainController::class);
Route::get('index', [MainController::class, 'index'])->name('index');
Route::get('listing', [MainController::class, 'listing'])->name('listing');
Route::get('maintestimonial', [MainController::class, 'testimonial'])->name('maintestimonial');
Route::get('blog', [MainController::class, 'blog'])->name('blog');
Route::get('about', [MainController::class, 'about'])->name('about');
Route::get('contact', [MainController::class, 'create'])->name('contact');
Route::post('sendcontactinfo', [MainController::class, 'sendcontactinfo'])->name('sendcontactinfo');
Route::get('singlecar/{id}', [MainController::class, 'show'])->name('singlecar');
