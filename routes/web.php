<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [ArticleController::class, 'index']);
Route::get('articles', [ArticleController::class, 'index']);
Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);
Route::get('/articles/detail/{id}',[ArticleController::class, 'detail']);
Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::post('/articles/edit/{id}', [ArticleController::class, 'update']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::post('/comments/add', [CommentController::class, 'commentCreate']);
Route::get('/comment/delete/{id}', [CommentController::class, 'delete']);

Route::get('/home', [ArticleController::class, 'index'])->name('home');
