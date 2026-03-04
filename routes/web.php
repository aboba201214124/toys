<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']) ;
Route::get('/categories', [MainController::class, 'categories']) ;
Route::get('/category/{category}', [MainController::class, 'products']) ;
Route::get('/login', [LoginController::class, 'loginPage']) ;
Route::post('/login', [LoginController::class, 'login']) ;
Route::get('/register', [RegisterController::class, 'registerPage']) ;
Route::post('/register', [RegisterController::class, 'register']) ;
Route::get('/logout', [MainController::class, 'logout']) ;








