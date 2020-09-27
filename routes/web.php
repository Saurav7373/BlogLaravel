<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\HomeController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;





// user Route
Route::group(['namespace' => 'User'], function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/post/{slug}', [\App\Http\Controllers\User\PostController::class, 'post'])->name('post');
    Route::get('/post/tag/{tag}', [\App\Http\Controllers\User\HomeController::class, 'tag'])->name('tag');
    Route::get('/post/category/{category}', [HomeController::class, 'category'])->name('category');
    Route::get('admin/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home'); 
   
});


// admin route
Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::resource('admin/post', 'PostController');
    Route::resource('admin/user', 'UserController');
  
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/category', 'CategoryController');
});

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
// admin auth route
Route::get('admin-login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin-login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
