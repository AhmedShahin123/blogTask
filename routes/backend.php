<?php

use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::group(['middleware' => ['auth', 'role:owner|admin|author']], function () {
    //profile
    Route::get('profile', [UserController::class, 'profile'])->name('user-profile');
    //dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

    //admin articles
    Route::get('article', [ArticleController::class, 'index'])->name('backend.article.index');
    Route::get('article/create', [ArticleController::class, 'create'])->name('backend.article.create');
    Route::get('article/{article}/edit', [ArticleController::class, 'edit'])->name('backend.article.edit');


    Route::get('article/autoimport', [ArticleController::class, 'autoimport'])->name('backend.article.autoimport');

});

Route::group(['middleware' => ['auth', 'role:owner|admin']], function () {
    Route::get('category', [CategoryController::class, 'index'])->name('backend.category.index');

    //Admin users
    Route::get('user', [UserController::class, 'index'])->name('backend.user.index');
    Route::get('user/password/edit', [UserController::class, 'editPassword'])->name('backend.user.password.edit');
    Route::get('user/create', [UserController::class, 'create'])->name('backend.user.create');
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('backend.user.edit');


});
