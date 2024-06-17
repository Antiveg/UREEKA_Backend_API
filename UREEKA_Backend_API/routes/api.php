<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckRoleAdmin;
use App\Http\Middleware\CustomAuthenticate;
use Illuminate\Support\Facades\Route;

// User Authentication
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login'])->name('login');

// Protect routes with middleware for authenticated users
Route::middleware(['custom_auth'])->group(function () {

    Route::get('view/{isbn?}', [BookController::class, 'view']);
    Route::post('logout', [LoginController::class, 'logout'])->middleware([CustomAuthenticate::class]);
    
    Route::middleware(['is_admin'])->group(function (){
        Route::post('create', [BookController::class, 'create'])->middleware([CustomAuthenticate::class]);
        Route::put('update/{isbn}', [BookController::class, 'update'])->middleware([CustomAuthenticate::class]);
        Route::delete('delete/{isbn}', [BookController::class, 'delete'])->middleware([CustomAuthenticate::class]);
    });
});
