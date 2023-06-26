<?php

use App\Http\Controllers\PostController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\ProductImageController;

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Url;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PostController::class,'index'])->name('posts');
Route::get('/cards',[PostController::class,'cards'])->name('cards');
//
// Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');

// Route::get('/categories/{id}',[CategoryController::class,'show']);

// Route::get('/categories/create',[CategoryController::class,'create']);

// Route::get('/categories/edit',[CategoryController::class,'edit']);

// Route::post('/categories/store',[CategoryController::class,'store']);

// Route::put('/categories/{id}/update',[CategoryController::class,'update']);

// Route::delete('/categories/{id}',[CategoryController::class,'destroy']);

// Route::resource('categories', 'CategoryController::class');

Route::resource('categories', CategoryController::class);

Route::resource('brands', BrandController::class);

Route::resource('products', ProductController::class);

Route::resource('product_images', ProductImageController::class);
