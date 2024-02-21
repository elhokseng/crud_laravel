<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ProductController::class, 'Apiindex'])->name('Apiproduct.index');
Route::get('/product/create', [ProductController::class, 'Apicreate'])->name('Apiproduct.create');
Route::post('/product/store',[ProductController::class, 'Apistore'])->name('Apiproduct.store');
Route::get('/product/{id}/edit', [ProductController::class, 'Apiedit'])->name('Apiproduct.edit');
Route::put('product/{id}', [ProductController::class, 'Apiupdate'])->name('Apiproduct.update');
Route::get('/product/{id}/delete',[ProductController::class,'Apidelete'])->name('Apiproduct.delete');
Route::get('/product/{id}/view',[ProductController::class,'Apiview'])->name('Apiproduct.view');    