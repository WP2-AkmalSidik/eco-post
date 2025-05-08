<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ManagementUserController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;


// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// User Dashboard
Route::middleware(['auth', 'user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.user');
});

// Admin Dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/users', [ManagementUserController::class, 'index'])->name('users-management.index');
    Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});

