<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


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

// Admin Controller With Middleware Auth
Route::prefix('/admin')->middleware('auth')->group(function () {
     //Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
     //Profile Route
    Route::controller(ProfileController::class)->group(function () { 

        Route::match(['get', 'post'], '/profile', 'profile')->name('admin.profile');

    });
  //Brand Route
    Route::controller(BrandController::class)->group(function () { 
   
        Route::get('/brand', 'brand')->name('admin.brand');
        Route::match(['get', 'post'], '/brand/create', 'create')->name('brand.create');
        Route::match(['get', 'post'], '/brand/edit/{id}', 'update')->name('brand.update');
        Route::get('/brand/delete/{id}', 'delete')->name('brand.delete');

    });

      //Category Route
      Route::controller(CategoryController::class)->group(function () { 
   
        Route::get('/category', 'category')->name('admin.category');
        Route::match(['get', 'post'], '/category/create', 'create')->name('category.create');

    });

    //Product Route
    Route::controller(ProductController::class)->group(function () { 
   
        Route::get('/product', 'product')->name('admin.product');
        Route::match(['get', 'post'], '/product/create', 'create')->name('product.create');
    
    });


});

// Login And Register Route
Route::controller(AuthController::class)->group(function () { 

    Route::match(['get', 'post'], '/', 'login')->name('login');
    Route::match(['get', 'post'], '/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');

});

 
 
 
