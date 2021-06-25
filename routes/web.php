<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MailController;

Route::get('/',function(){
    return redirect('/posts');
});
Route::get('/home',function(){
    return redirect('/posts');
});

Route::get('/', [PostController::class, 'index']);
Route::get('/notificaciones', [CommentController::Class,'notify']);
Route::view('/posts/create', 'create');
Route::post('/posts/create', [PostController::class, 'create']);

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::view('/posts/create', 'posts.create');
Route::post('/posts/create',[PostController::class, 'store']);
Route::get('/posts/myPosts',[PostController::class,'userPosts']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::post('/comments',[CommentController::class,'store']);

Route::get('/posts/{post}/destroy',[PostController::class,'destroy'])->name('post.destroy');
//Route::get('/posts/{post}/destroy',[PostController::class,'destroy'])->name('post.destroy');
Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
//Route::view('/users/edit', 'users.edit');
Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
Route::get('/users/{user}/destroy',[UserController::class,'destroy'])->name('users.destroy');

Route::get('email/{numero}', [MailController::class, 'sendMail']);

Auth::routes();

Route::get('/today', [PostController::class, 'today'])->name('today'); //Ruta del blade de hoy

Route::get('/home', [PostController::class, 'index'])->name('home');

