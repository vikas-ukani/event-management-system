<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Events\EventController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::view('login', 'login')->name('login');
Route::get('register', [AuthController::class, 'registerView'])->name('register');
Route::get('logout',  [AuthController::class, 'logout'])->name('logout');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

/** All Authenticated Routes */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('event', EventController::class);
});
