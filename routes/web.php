<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\UserController;

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
Route::middleware('auth')->group (function(){
    Route::get('/product',[productController::class, 'index'] )->name('product.index');
    Route::get('/product/show/{id}', [productController::class, 'show'])->name('product.show');
    Route::delete('/product/delete/{id}', [productController::class, 'destroy'])->name('product.delete');
    Route::get('/product/update/{id}', [productController::class, 'update'])->name('product.update');
    Route::put('/product/edit/{id}', [productController::class, 'edit'])->name('product.edit');
    Route::get('/product/create', [productController::class, 'create'])->name('product.create');
    Route::post('/product/store', [productController::class, 'store'])->name('product.store');
    Route::get('/product/search', [productController::class, 'search'])->name('product.search');
    Route::get('/category',[categoryController::class, 'index'] )->name('category.index');
    Route::get('/category/show/{id}',[categoryController::class, 'show'] )->name('category.show');
    Route::delete('/category/delete/{id}',[categoryController::class, 'destroy'] )->name('category.delete');
    Route::get('/category/update/{id}',[categoryController::class, 'update'] )->name('category.update');
    Route::put('/category/edit/{id}',[categoryController::class, 'edit'] )->name('category.edit');
    Route::get('/category/create',[categoryController::class, 'create'] )->name('category.create');
    Route::post('/category/store',[categoryController::class, 'store'] )->name('category.store');
    Route::get('/category/search', [categoryController::class, 'search'])->name('category.search');
    Route::get('/order',[orderController::class,'index'])->name('order.index');
    Route::delete('/order/delete/{id}',[orderController::class,'destroy'])->name('order.delete');
    Route::get('/order/update/{id}',[orderController::class,'update'])->name('order.update');
    Route::put('/order/edit/{id}',[orderController::class,'edit'])->name('order.edit');
    Route::get('/order/create',[orderController::class,'create'])->name('order.create');
    Route::post('/order/store',[orderController::class,'store'])->name('order.store');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::put('/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('user.delete');
});



Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
