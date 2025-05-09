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
use App\Http\Controllers\User\CreatePostController;
use App\Http\Controllers\User\DetailPostController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Admin\ManagementUserController;


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
    Route::get('/create-post', [CreatePostController::class, 'index'])->name('post.create');
    Route::post('/create-post', [CreatePostController::class, 'store'])->name('post.store');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.user');
    Route::get('/detail-post', [DetailPostController::class, 'index'])->name('detail-post.index');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.users');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('/comments/load-more', [CommentController::class, 'loadMore'])->name('comments.load-more');
});

// Admin Dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/users', [ManagementUserController::class, 'index'])->name('users-management.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // category
    Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
});

