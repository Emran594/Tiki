<?php

use App\Http\Controllers\AdminController;
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
