<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [ArticleController::class, 'index']);
Route::get('articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}',[ArticleController::class, 'detail']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
