<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
//comments
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store']);

//user register
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
//user login
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');
//user logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

//Subscription route
Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandaler']);

//admin routes
Route::middleware('can:admin')->group(function () {
    // blogs for admin
    Route::get('/admin/blogs', [AdminBlogController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminBlogController::class, 'store']);
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update']);
    Route::delete('/admin/blogs/{blog:slug}/delete', [AdminBlogController::class, 'destory']);

    // categories for admin
    Route::get('/admin/categories/create', [AdminCategoryController::class, 'create']);
    Route::post('/admin/categories/store', [AdminCategoryController::class, 'store']);
});
