<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/',[ProductController::class,'index'])->name('/');
Route::post('/add-Product',[ProductController::class,'saveProduct'])->name('add-Product');
Route::post('/update-Product',[ProductController::class,'updateProduct'])->name('update-Product');
Route::post('/delete-Product',[ProductController::class,'deleteProduct'])->name('delete-Product');
// Route::get('/edit-Product/{id}',[ProductController::class,'editProduct'])->name('edit-Product');
