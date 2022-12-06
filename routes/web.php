<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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


Route::prefix('/admin')->controller(AdminController::class)->middleware('admin')->group(function () {
    Route::get('admin/dashboard', 'index')->name('admin.dashboard')->middleware('auth');

    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::post('admin/profile/create', 'profile')->name('profile.create');
});


Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('create-login', [AuthController::class, 'createLogin'])->name('create.login');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('create-register', [AuthController::class, 'createRegister'])->name('create.register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
