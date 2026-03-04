<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']) ;
Route::get('/categories', [MainController::class, 'categories']) ;
Route::get('/contacts', [MainController::class, 'index']) ;








