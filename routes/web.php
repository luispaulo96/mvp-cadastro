<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [CarController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register/send', [RegisterController::class, 'send'])->name('register.send');

Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

Route::post('/cars/store', [CarController::class, 'store'])->name('cars.store');

Route::get('/cars/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');

Route::put('/cars/update/{id}', [CarController::class, 'update'])->name('cars.update');

Route::delete('/cars/destroy/{id}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');
