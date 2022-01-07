<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('categori',[CategoryController::class,'index'])->name('cat.index');
Route::post('categori',[CategoryController::class,'store'])->name('cat.store');
Route::get('categori/{category:id}',[CategoryController::class,'show'])->name('cat.show');
Route::put('/categori',[CategoryController::class,'update'])->name('cat.edit');
Route::delete('/categori/{id}',[CategoryController::class,'destroy'])->name('cat.delete');

Route::get('buku',[BookController::class,'create'])->name('book.create');
