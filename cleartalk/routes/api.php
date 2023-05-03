<?php

use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/slaves', [UserController::class, 'getSlaves']);
Route::resource('users',UserController::class);
