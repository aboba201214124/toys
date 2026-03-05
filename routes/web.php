<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']) ;
Route::get('/categories', [MainController::class, 'categories']) ;
Route::get('/category/{category}', [MainController::class, 'products']) ;
Route::get('/login', [LoginController::class, 'loginPage'])->name('login') ;
Route::post('/login', [LoginController::class, 'login']) ;
Route::get('/register', [RegisterController::class, 'registerPage']) ;
Route::post('/register', [RegisterController::class, 'register']) ;
Route::get('/logout', [MainController::class, 'logout'])->middleware('auth') ;
Route::get('/cart/add/{id}', [CartController::class, 'add'])->middleware('auth') ;
Route::get('/cart/minus/{id}', [CartController::class, 'minus'])->middleware('auth') ;
Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->middleware('auth') ;
Route::get('/cart/clear', [CartController::class, 'clearAll'])->middleware('auth') ;
Route::get('/cart', [CartController::class, 'cart'])->middleware('auth') ;
Route::get('/cart/history', [CartController::class, 'history'])->middleware('auth') ;
Route::get('/order/create', [CartController::class, 'orderCreate'])->middleware('auth') ;
Route::post('/order/create', [CartController::class, 'orderStore'])->middleware('auth') ;








