<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [PostController::class, 'random'])->name('posts.random');

Route::get('/home',[PostController::class, 'random'])->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->middleware(['auth'])->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware(['auth'])->name('posts.destroy');

Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');

Route::patch('/posts/edit/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/posts/comment/edit/{id}', [CommentController::class, 'update'])->name('comment.edit');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
