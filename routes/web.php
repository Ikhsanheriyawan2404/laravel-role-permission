<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


// Auth::routes(['register' => false]);
Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
});

Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role');
    Route::get('role/create', [RoleController::class, 'index'])->name('role.create');
});

Route::prefix('items')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('item');
    Route::get('item/create', [ItemController::class, 'index'])->name('item.create');
});

Route::middleware('role:admin')->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
