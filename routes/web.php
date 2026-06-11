<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Login page
Route::get('/', [UserController::class, 'loginPage'])
    ->name('login');


// xử lý login
Route::post('/login', [UserController::class, 'login'])
    ->name('login.post');


// CRUD User
Route::resource('users', UserController::class);