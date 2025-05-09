<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\DetailPostController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Admin\ManagementUserController;

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Public Routes (accessible to everyone)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/posts/{slug}', [DetailPostController::class, 'show'])->name('detail-post.index');

// Comment Routes (require auth)
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// User Dashboard (require auth)
Route::middleware(['auth', 'user'])->prefix('user')->group(function () {
    Route::get('/create-post', [PostController::class, 'index'])->name('post.create');
    Route::post('/create-post', [PostController::class, 'store'])->name('post.store');
    Route::put('/post/{slug}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/{slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.user');
    // Profile Routes
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.users');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/photo', [UserProfileController::class, 'deletePhoto'])->name('profile.delete.photo');
});

// Admin Dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // User Management Routes
    Route::get('/users', [ManagementUserController::class, 'index'])->name('users-management.index');
    Route::post('/users', [ManagementUserController::class, 'store'])->name('users-management.store');
    Route::put('/users/{user}', [ManagementUserController::class, 'update'])->name('users-management.update');
    Route::delete('/users/{user}', [ManagementUserController::class, 'destroy'])->name('users-management.destroy');
    // category
    Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
});

