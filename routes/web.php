<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/mypage', [LoginController::class, 'login'])->name('login.login');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/thanks', [RegisterController::class, 'register'])->name('register.register');
