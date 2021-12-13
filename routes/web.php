<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');


//Article
Route::get('article', [ArticleController::class, 'index'])->name('articles');
Route::get('article/{articleId}/{articleHeading?}', [ArticleController::class, 'show'])->name('get-article');


//Admin auth
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('login-form');
Route::post('admin/login', [AuthController::class, 'login'])->name('login');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('admin/signup', [AuthController::class, 'signUp'])->name('signup-form');
Route::post('admin/signup', [AuthController::class, 'postSignUp'])->name('register');
