<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/login', [UserController::class, 'apiLogin'])
    ->name('api.login');

Route::apiResource('users', UserController::class)
    ->names('api.users');