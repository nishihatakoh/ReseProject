<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\Shop_allController;
use App\Http\Controllers\Shop_detailController;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/thanks', [RegisterController::class, 'register'])->name('register.register');
    Route::get('/', [Shop_allController::class, 'index'])->name('shop_all.index');
    Route::post('/find', [Shop_allController::class, 'find'])->name('shop_all.find');
    Route::post('/shop_detail', [Shop_allController::class, 'detail'])->name('shop_all.detail');
    Route::get('/shop_datail', [Shop_detailController::class, 'index'])->name('shop_detail.index');

});

Route::middleware(['auth'])->group(function () {
    Route::post('/mypage', [LoginController::class, 'login'])->name('login.login');
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage.index');
    Route::get('logout', [MypageController::class, 'logout'])->name('mypage.logout');
    Route::post('logout', [MypageController::class, 'logout'])->name('mypage.logout');

});


