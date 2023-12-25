<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
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


Route::get('/admin',[AdminController::class,'index']);
Route::post('/admin/create',[AdminController::class,'create'])->name('admin.create');
Route::delete('/admin/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');


Route::get('/booking',[BookingController::class,'index']);
Route::post('/booking/create',[BookingController::class,'create'])->name('booking.create');
Route::delete('/book/delete/{id}',[BookingController::class,'delete'])->name('booking.delete');
Route::get('/view/{id}',[BookingController::class,'view'])->name('view');
