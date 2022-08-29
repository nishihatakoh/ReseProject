<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\Shop_allController;
use App\Http\Controllers\Shop_detailController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminMypageController;
use App\Http\Controllers\OwnerLoginController;
use App\Http\Controllers\OwnerMypageController;
use App\Http\Controllers\OwnerCreateController;
use App\Http\Controllers\OwnerchangeController;
use App\Http\Controllers\OwnerReserveController;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/mypage', [LoginController::class, 'login'])->name('login.login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/thanks', [RegisterController::class, 'register'])->name('register.register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage.index');
    Route::post('/delete', [MypageController::class, 'delete'])->name('mypage.delete');
    Route::post('/mypage/detail', [MypageController::class, 'detail'])->name('mypage.detail');
    Route::post('/mypage/unfavorite', [MypageController::class, 'unfavorite'])->name('mypage.unfavorite'); 
    Route::get('logout', [MypageController::class, 'logout'])->name('mypage.logout');
    Route::post('logout', [MypageController::class, 'logout'])->name('mypage.logout');
    Route::get('/', [Shop_allController::class, 'index'])->name('shop_all.index');
    Route::post('/favorite', [Shop_allController::class, 'favorite'])->name('shop_all.favorite');   
    Route::post('/find', [Shop_allController::class, 'find'])->name('shop_all.find');
    Route::post('/shop_detail', [Shop_allController::class, 'detail'])->name('shop_all.detail');
    Route::post('/done',[Shop_detailController::class, 'reserve'])->name('shop_detail.reserve');
    Route::post('/review',[ReviewController::class, 'index'])->name('review.index');
    Route::post('/review/done',[ReviewController::class, 'review'])->name('review.review');
    Route::get('/done',[DoneController::class, 'index'])->name('done.index');
    Route::post('/mypage/change',[changeController::class, 'index'])->name('change.index');
    Route::post('/mypage/change/done',[changeController::class, 'change'])->name('change.change');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login.index');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.login');
    Route::get('/', [AdminMypageController::class, 'index'])->name('admin.mypage.index')->middleware(['admin']);
    Route::get('/create', [AdminMypageController::class, 'create'])->name('admin.mypage.create')->middleware(['admin']);
    Route::post('/create', [AdminMypageController::class, 'create'])->name('admin.mypage.create')->middleware(['admin']);
    Route::get('logout', [AdminMypageController::class, 'logout'])->name('admin.login.logout')->middleware(['admin']);
    Route::get('/register', [AdminRegisterController::class, 'index'])->name('admin.register.index')->middleware(['admin']);
    Route::post('/register/done', [AdminRegisterController::class, 'register'])->name('admin.register.register')->middleware(['admin']);
});

Route::prefix('owner')->group(function () {
    Route::get('login', [OwnerLoginController::class, 'index'])->name('owner.login.index');
    Route::post('login', [OwnerLoginController::class, 'login'])->name('owner.login.login');
    Route::get('/', [OwnerMypageController::class, 'index'])->name('owner.mypage.index')->middleware(['owner']);
    Route::get('/create', [OwnerCreateController::class, 'index'])->name('owner.create.index')->middleware(['owner']);
    Route::get('/change', [OwnerchangeController::class, 'index'])->name('owner.change.index')->middleware(['owner']);
    Route::get('/reserve', [OwnerReserveController::class, 'index'])->name('owner.reserve.index')->middleware(['owner']);
});


//公式ドキュメントを参照『メール認証』
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/mypage');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');