<?php


use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;





Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show']);


Route::post('posts/{post}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::delete('posts/{comment}/comment', [CommentController::class, 'destroy'])->middleware('auth');


Route::get('admin/posts/dashboard', [AdminPostController::class, 'show'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('auth');
Route::post('admin/post', [AdminPostController::class, 'store'])->middleware('auth');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin')->name('update');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');


Route::get('admin/category/dashboard', [CategoryController::class, 'show'])->middleware('admin');
Route::get('admin/category/create', [CategoryController::class, 'create'])->middleware('admin');
Route::post('admin/category', [CategoryController::class, 'store'])->middleware('admin');
Route::delete('admin/category/{category}', [CategoryController::class, 'destroy'])->middleware('admin');


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::get('user/posts/{user}/dashboard', [UserPostController::class, 'show'])->middleware('auth');
Route::get('user/posts/{post}/edit', [UserPostController::class, 'edit'])->middleware('auth');
Route::patch('user/posts/{post}', [UserPostController::class, 'update'])->middleware('auth');

Route::get('user/{user}', [UserController::class, 'edit'])->middleware('auth');
Route::patch('user/{user}', [UserController::class, 'update'])->middleware('auth');
Route::get('user/{user}/password',  [UserController::class, 'showPassword'])->middleware('auth');
Route::post('user/{user}/password',  [UserController::class, 'changePassword'])->middleware('auth');





