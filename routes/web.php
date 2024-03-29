<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store',[ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/{id}/delete',[ProductController::class,'delete'])->name('product.delete');
Route::get('/product/{id}/view',[ProductController::class,'view'])->name('product.view');
Route::get('/search',[ProductController::class, 'Search'])->name('product.search');