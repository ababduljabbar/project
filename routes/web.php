<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

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

});

// Login And Register Route
Route::controller(AuthController::class)->group(function () { 

    Route::match(['get', 'post'], '/', 'login')->name('login');
    Route::match(['get', 'post'], '/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');

});

 
 
 
