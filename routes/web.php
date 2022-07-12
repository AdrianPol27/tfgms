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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard', [App\Http\Controllers\UserDashboardController::class, 'index'])->name('user.dashboard');

//Products
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/add', [ProductController::class, 'addProduct'])->name('product.add');
Route::post('/products/addSubmit', [ProductController::class, 'addProductSubmit'])->name('product.addSubmit');
Route::get('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
Route::get('/products/view/{id}', [ProductController::class, 'viewProduct'])->name('product.view');
Route::get('/products/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
Route::post('/products/update', [ProductController::class, 'updateProduct'])->name('product.update');

