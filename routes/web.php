<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StripePaymentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/error', [HomeController::class, 'error']);
Route::get('/registration_confirmation', [HomeController::class, 'registration_confirmation']);
Route::get('/order_completed', [HomeController::class, 'order_completed']);
Route::get('/account_edit_confirm', [HomeController::class,'account_edit_confirm']);
Route::get('/product_edit', [HomeController::class, 'product_edit']);
Route::get('/product_detail', [HomeController::class, 'showProductDetail'])->name('product_detail');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/signin', [UserController::class, 'signin'])->name('signin');
Route::get('/signin', [UserController::class, 'showSigninForm'])->name('showSigninForm');
Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [RegisterController::class, 'register']);
Route::get('/product_management', [ProductController::class, 'index'])->name('product_management');

Route::get('/product_edit/{product}', [ProductController::class, 'edit'])->name('product_edit');


Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/product_update/{product}', [ProductController::class, 'update'])->name('product_update');


Route::get('products/create', [ProductController::class, 'create'])->name('product_create');
Route::post('products_store', [ProductController::class, 'store'])->name('products_store');

Route::get('/account/edit', [UserController::class, 'account_edit'])->name('account_edit');
Route::put('/account/edit', [UserController::class, 'update'])->name('account_update');
Route::post('/account/edit', [UserController::class, 'update'])->name('account_update');


Route::post('/favorite/{productId}', [FavoriteController::class, 'store'])->name('favorite.store');
Route::post('/cart/{productId}', [CartController::class, 'store'])->name('cart.store');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

//クレジット処理
Route::get('/credit', [StripePaymentsController::class, 'index'])->name('credit.index');
Route::post('/payment', [StripePaymentsController::class, 'payment'])->name('make.payment');
Route::post('/payment_complete', [StripePaymentsController::class, 'complete'])->name('payment_complete');
Route::post('/thanks', [StripePaymentsController::class, 'complete'])->name('thanks');

//パスワードリセット画面
Route::get('/password-reset', [UserController::class, 'showResetPasswordForm'])->name('password_reset');
// パスワードリセットアクション用のルート
Route::post('/password_reset_action', [UserController::class, 'passwordReset'])->name('password_reset_action');

//ログアウト処理
Route::any('/signout', [UserController::class, 'signOut'])->name('signout');

//カートから削除
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
