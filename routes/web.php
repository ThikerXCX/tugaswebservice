<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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
Route::get('/', [HomeController::class,'index']);
Route::get('/home/{buku:slug}', [HomeController::class,'show']);

Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'store']);
    Route::get('register', [RegistrationController::class, 'create'])->name('register');//bisa menggunakan->middleware('guest') setelah nama
    Route::post('register', [RegistrationController::class, 'store']); // bisa tetap pake route karena pad form menggunakan method post
});

Route::middleware('auth')->group(function(){
    Route::get('categori',[CategoryController::class,'index'])->name('cat.index');
    Route::post('categori',[CategoryController::class,'store'])->name('cat.store');
    Route::get('categori/{category:id}',[CategoryController::class,'show'])->name('cat.show');
    Route::put('/categori',[CategoryController::class,'update'])->name('cat.edit');
    Route::delete('/categori/{id}',[CategoryController::class,'destroy'])->name('cat.delete');

    Route::get('/buku',[BookController::class,'index'])->name('book.index');
    Route::get('/buku/create',[BookController::class,'create'])->name('book.create');
    Route::post('/buku/create',[BookController::class,'store'])->name('book.store');
    Route::get('/buku/create/check',[BookController::class,'checkSlug'])->name('book.check');
    Route::get('buku/{buku:slug}',[BookController::class,'viewSampul']);
    Route::get('/buku/edit/{buku:slug}',[BookController::class,'edit'])->name('book.edit');
    Route::put('/buku/edit/{buku:slug}',[BookController::class,'update'])->name('book.edit');
    Route::delete('/buku/delete/{buku:slug}',[BookController::class,'destroy'])->name('book.del');

    Route::post('logout',LogoutController::class)->name('logout');
});

