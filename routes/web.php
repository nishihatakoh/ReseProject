<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ShopAllController;
use App\Http\Controllers\ShopDetailController;
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
use App\Http\Controllers\AdminMailController;


//ログイン前のURL
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/mypage', [LoginController::class, 'login'])->name('login.login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/thanks', [RegisterController::class, 'register'])->name('register.register');
    
});

//QRコードを読み取った後の画面
Route::get('/mypage/qrcode/detail/{id}', [MypageController::class, 'qrcodedetail'])->name('mypage.qrcodedetail'); 

//ログイン後のURL
Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage.index');
    Route::post('/delete', [MypageController::class, 'delete'])->name('mypage.delete');
    Route::post('/mypage/unfavorite', [MypageController::class, 'unfavorite'])->name('mypage.unfavorite');
    Route::post('/mypage/qrcode', [MypageController::class, 'qrcode'])->name('mypage.qrcode'); 
    Route::post('/mypage/charge', [MypageController::class, 'charge'])->name('mypage.charge');
    Route::get('logout', [MypageController::class, 'logout'])->name('mypage.logout');
    Route::post('logout', [MypageController::class, 'logout'])->name('mypage.logout');
    Route::get('/', [ShopAllController::class, 'index'])->name('shop_all.index');
    Route::post('/favorite', [ShopAllController::class, 'favorite'])->name('shop_all.favorite');   
    Route::post('/find', [ShopAllController::class, 'find'])->name('shop_all.find');
    Route::post('/shop_detail', [ShopAllController::class, 'detail'])->name('shop_all.detail');
    Route::post('/done',[ShopDetailController::class, 'reserve'])->name('shop_detail.reserve');
    Route::post('/review',[ReviewController::class, 'index'])->name('review.index');
    Route::post('/review/done',[ReviewController::class, 'review'])->name('review.review');
    Route::get('/done',[DoneController::class, 'index'])->name('done.index');
    Route::post('/mypage/change',[changeController::class, 'index'])->name('change.index');
    Route::post('/mypage/change/done',[changeController::class, 'change'])->name('change.change');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login.index');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.login');
    Route::get('/register', [AdminRegisterController::class, 'index'])->name('admin.register.index');
    Route::post('/register/done', [AdminRegisterController::class, 'register'])->name('admin.register.register');
    Route::get('/', [AdminMypageController::class, 'index'])->name('admin.mypage.index')->middleware(['admin']);
    Route::get('/create', [AdminMypageController::class, 'create'])->name('admin.mypage.create')->middleware(['admin']);
    Route::post('/create', [AdminMypageController::class, 'create'])->name('admin.mypage.create')->middleware(['admin']);
    Route::get('logout', [AdminMypageController::class, 'logout'])->name('admin.login.logout')->middleware(['admin']);
    Route::get('/mail',[AdminMailController::class,'index'])->name('admin.mail.index')->middleware(['admin']);
    Route::post('/mail/usermail',[AdminMailController::class,'send'])->name('admin.mail.send')->middleware(['admin']);
    Route::post('/mail/done',[AdminMailController::class,'sendmail'])->name('admin.mail.sendmail')->middleware(['admin']);

});

Route::prefix('owner')->group(function () {
    Route::get('login', [OwnerLoginController::class, 'index'])->name('owner.login.index');
    Route::post('login', [OwnerLoginController::class, 'login'])->name('owner.login.login');
    Route::get('logout', [OwnerMypageController::class, 'logout'])->name('owner.mypage.logout')->middleware(['owner']);
    Route::get('/', [OwnerMypageController::class, 'index'])->name('owner.mypage.index')->middleware(['owner']);
    Route::get('/create', [OwnerCreateController::class, 'index'])->name('owner.create.index')->middleware(['owner']);
    Route::post('/create/done', [OwnerCreateController::class, 'create'])->name('owner.create.create')->middleware(['owner']);
    Route::get('/change', [OwnerchangeController::class, 'index'])->name('owner.change.index')->middleware(['owner']);
    Route::post('/change/done', [OwnerchangeController::class, 'change'])->name('owner.change.change')->middleware(['owner']);
    Route::get('/reserve', [OwnerReserveController::class, 'index'])->name('owner.reserve.index')->middleware(['owner']);
});


Route::get('/aaa', [mypageController::class, 'aaa']);


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