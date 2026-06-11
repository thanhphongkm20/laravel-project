<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'loginPage'])
    ->name('login');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.post');

Route::resource('users', UserController::class);