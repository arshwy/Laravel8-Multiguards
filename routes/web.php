<?php

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
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Doctor\DoctorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){

  Route::middleware(['guest:web', 'preventBackHistory'])->group(function(){
    Route::view('/login', 'dashboard.user.login')->name('login');
    Route::view('/register', 'dashboard.user.register')->name('register');
    Route::post('/create', [UserController::class, 'create'])->name('create');
    Route::post('/check', [UserController::class, 'check'])->name('check');
  });

  Route::middleware(['auth:web', 'preventBackHistory'])->group(function(){
    Route::view('/home', 'dashboard.user.home')->name('home');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
  });

});



Route::prefix('admin')->name('admin.')->group(function(){

  Route::middleware(['guest:admin'])->group(function(){
    Route::view('/login', 'dashboard.admin.login')->name('login');
    Route::post('/check', [AdminController::class, 'check'])->name('check');
  });

  Route::middleware(['auth:admin'])->group(function(){
    Route::view('/home', 'dashboard.admin.home')->name('home');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
  });

});



Route::prefix('doctor')->name('doctor.')->group(function(){

  Route::middleware(['guest:doctor'])->group(function(){
    Route::view('/login', 'dashboard.doctor.login')->name('login');
    Route::view('/register', 'dashboard.doctor.register')->name('register');
    Route::post('/create', [DoctorController::class, 'create'])->name('create');
    Route::post('/check', [DoctorController::class, 'check'])->name('check');
  });

  Route::middleware(['auth:doctor'])->group(function(){
    Route::view('/home', 'dashboard.doctor.home')->name('home');
    Route::post('/logout', [DoctorController::class, 'logout'])->name('logout');
  });

});





//
