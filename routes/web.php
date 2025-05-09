<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [loginController::class, 'login']);
Route::get('/subscrive', [loginController::class, 'subscrive']);
Route::post('/subscrive', [loginController::class, 'store'])->name('cadastrar');

Route::resource('lists', ListController::class);

