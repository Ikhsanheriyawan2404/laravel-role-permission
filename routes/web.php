<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login', [
        'title' => 'Masuk'
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::get('users.create', [UserController::class, 'create'])->name('create');
    Route::post('users.store', [UserController::class, 'store'])->name('store');
});

Route::middleware('role:admin')->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
