<?php

use App\Events\HelloEvent;
use App\Http\Controllers\Admin\CategoryController;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OngkosKirimController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Seller\OrderController as SellerOrder;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Seller\BalanceController;
use App\Http\Controllers\DuitkuController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VoucherController as AdminVoucherController;
use App\Http\Controllers\Admin\WithdrawController;
use App\Http\Controllers\Auth\ForgotPassword;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DisbursementController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\ProductController as Product;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\Seller\RatingController;
use App\Http\Controllers\Seller\StatisticController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\VoucherController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Product::class, 'index'])->name('product');

// Authenticate
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticated'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register-seller', [RegisterController::class, 'seller'])->name('register.seller')->middleware('guest');
Route::post('/register-seller', [RegisterController::class, 'store_seller'])->name('register.store.seller');
Route::get('/forgot-password', [ForgotPassword::class, 'index'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPassword::class, 'request'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token, 'title' => 'Reset Password']);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [ForgotPassword::class, 'reset'])->middleware('guest')->name('reset.password');

Route::get('/email/verify', function () {
    return view('verify-email', [
        'title' => 'Kirim ulang email verifikasi'
    ]);
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('success', 'Verifikasi berhasil');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with(['status' => 'verification-link-sent', 'message' => 'Silahkan cek email untuk verifikasi']);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// End Authenticate

//Contact Us
Route::get('contactUs', [ContactUsController::class, 'index'])->name('contactUs');
Route::post('contactUs', [ContactUsController::class, 'store'])->name('contactUs.store');

//Pusat Bantuan
Route::get('/help', [HelpCenterController::class, 'index'])->name('help.center');
Route::get('/help/cara-daftar-akun', [HelpCenterController::class, 'akun'])->name('help.center.akun');


// Product
Route::get('/product/explore', [Product::class, 'index'])->name('product.explore');
Route::get('/product/category', [Product::class, 'category'])->name('product.category');
Route::get('/product/detail/{slug}', [Product::class, 'show'])->name('product.detail');
Route::get('/cart', [Product::class, 'cart'])->name('cart.view')->middleware(['auth', 'verified']);
Route::post('/cart', [Product::class, 'cart_add'])->name('cart.add')->middleware(['auth', 'verified']);
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist')->middleware(['auth', 'verified']);
Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.add')->middleware(['auth', 'verified']);
Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.delete')->middleware(['auth', 'verified']);
// End Cart

// Order
Route::get('/resi/check/{resi}/{expedition}', [OrderController::class, 'checkResi'])->name('resi.check');
Route::get('/order/detail/{order_id}', [OrderController::class, 'detail'])->name('order.detail')->middleware(['auth', 'verified']);
Route::post('/callback/payment', [DuitkuController::class, 'paymentCallback']);
// End Order

// Regional
Route::post('/province', [RegionController::class, 'province'])->name('province');
Route::post('/city', [RegionController::class, 'city'])->name('city');
Route::post('/subdistrict', [RegionController::class, 'subdistrict'])->name('subdistrict');
// End Regional

// Chat
// Broadcast::channel('chat', function ($user) {
//     return Auth::check();
// });

Route::get('/chat', [ChatController::class, 'index'])->name('chat')->middleware(['auth', 'verified']);
Route::get('/chat/messages/{id}', [ChatController::class, 'getMessages'])->name('chat.messages')->middleware(['auth', 'verified']);
Route::post('/chat/messages', [ChatController::class, 'sendMessage'])->name('chat.send')->middleware(['auth', 'verified']);
// Emd Chat

// User Address
Route::post('/address/create', [UserAddressController::class, 'store'])->name('user.address.create')->middleware(['auth', 'verified']);
Route::get('/address/show/{id}', [UserAddressController::class, 'show'])->name('user.address.show')->middleware(['auth', 'verified']);
Route::put('/address/update/{id}', [UserAddressController::class, 'update'])->name('user.address.update')->middleware(['auth', 'verified']);
Route::delete('/address/delete/{id}', [UserAddressController::class, 'destroy'])->name('user.address.delete')->middleware(['auth', 'verified']);
// End User Address

// User Setting
Route::get('/setting', [SettingController::class, 'index'])->name('user.setting')->middleware(['auth', 'verified']);
Route::put('/setting/profil/{id}', [SettingController::class, 'updateProfil'])->name('user.update.profil')->middleware(['auth', 'verified']);
Route::post('/setting/changeImage/{id}', [SettingController::class, 'changeImage'])->name('user.update.image')->middleware(['auth', 'verified']);
Route::put('/setting/changePassword/{id}', [SettingController::class, 'changePassword'])->name('user.update.password')->middleware(['auth', 'verified']);

Route::post('/setting/changeLogo/{id}', [SettingController::class, 'changeLogo'])->name('store.update.logo')->middleware(['auth', 'verified']);
Route::put('/setting/rekening/{id}', [SettingController::class, 'updateRekening'])->name('user.update.rekening')->middleware(['auth', 'verified']);
Route::put('/setting/description/{id}', [SettingController::class, 'updateStore'])->name('store.update.description')->middleware(['auth', 'verified']);
// End User Setting

// Ongkir
Route::get('/ongkir/check', [OngkosKirimController::class, 'check'])->name('ongkir.check');
// End Ongkir

// Voucher
Route::get('/voucher/check', [VoucherController::class, 'check'])->name('voucher.check');
// End Voucher

// Route Untuk Text Editor Upload File
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth', 'verified']], function () {
    Lfm::routes();
});

Route::group(['middleware' => ['role:customer', 'auth', 'verified']], function () {
    // Customer Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('role:customer');
    // End Customer Dashboard

    // Order
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/order/pending', [OrderController::class, 'pending'])->name('order.pending');
    Route::get('/order/terbayar', [OrderController::class, 'terbayar'])->name('order.terbayar');
    Route::get('/order/diproses', [OrderController::class, 'diproses'])->name('order.diproses');
    Route::get('/order/dikirim', [OrderController::class, 'dikirim'])->name('order.dikirim');
    Route::get('/order/selesai', [OrderController::class, 'selesai'])->name('order.selesai');
    Route::get('/order/batal', [OrderController::class, 'batal'])->name('order.batal');

    Route::post('/order/selesai', [OrderController::class, 'diterima'])->name('order.accepted');
    // End Order

    Route::get('/order/count-pending', [OrderController::class, 'countPending'])->name('order.count.pending');
    Route::get('/order/count-transaction', [OrderController::class, 'countTransaction'])->name('order.count.transaction');

    // Checkout
    Route::post('/checkout', [CheckoutController::class, 'index'])->name('checkout.view')->middleware(['auth', 'verified']);
    Route::post('/checkout/process', [CheckoutController::class, 'checkout'])->name('checkout.process')->middleware(['auth', 'verified']);
    Route::post('/payment/process', [CheckoutController::class, 'process'])->name('payment.process')->middleware(['auth', 'verified']);
    Route::get('/payment/method', [CheckoutController::class, 'method'])->name('payment.method');
    // End Chekout
});

// Seller Router
Route::group(['middleware' => ['role:seller', 'auth', 'verified']], function () {
    Route::get('/seller/dashboard', [DashboardController::class, 'index'])->name('seller.dashboard');
    Route::get('/seller/dashboard', [DashboardController::class, 'index'])->name('seller.dashboard');

    Route::get('/seller/products', [ProductController::class, 'index']);
    Route::get('/seller/product/create', [ProductController::class, 'create']);
    Route::get('/seller/products/publish', [ProductController::class, 'publish'])->name('product.publish');
    Route::get('/seller/products/draft', [ProductController::class, 'draft'])->name('product.draft');
    Route::get('/seller/product/edit/{slug}', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/seller/products/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::put('/seller/products/discount/{id}', [ProductController::class, 'discountProduct'])->name('product.discount.product');
    Route::put('/seller/products/draft/{id}', [ProductController::class, 'draftProduct'])->name('product.draft.product');
    Route::put('/seller/products/publish/{id}', [ProductController::class, 'publishProduct'])->name('product.publish.product');
    Route::put('/seller/products/remove-discount/{id}', [ProductController::class, 'removeDiscount'])->name('product.remove_discount.product');

    Route::post('/seller/product/create', [ProductController::class, 'store'])->name('product.create');
    Route::put('/seller/product/update/{slug}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/seller/order', [SellerOrder::class, 'index'])->name('seller.order');
    Route::get('/seller/order/pending', [SellerOrder::class, 'pending'])->name('seller.order.pending');
    Route::get('/seller/order/terbayar', [SellerOrder::class, 'terbayar'])->name('seller.order.terbayar');
    Route::get('/seller/order/diproses', [SellerOrder::class, 'diproses'])->name('seller.order.diproses');
    Route::get('/seller/order/dikirim', [SellerOrder::class, 'dikirim'])->name('seller.order.dikirim');
    Route::get('/seller/order/selesai', [SellerOrder::class, 'selesai'])->name('seller.order.selesai');
    Route::get('/seller/order/batal', [SellerOrder::class, 'batal'])->name('seller.order.batal');

    Route::put('/seller/order/proses', [SellerOrder::class, 'process'])->name('seller.order.proses');
    Route::put('/seller/order/sending', [SellerOrder::class, 'sending'])->name('seller.order.kirim');
    Route::put('/seller/order/cancel', [SellerOrder::class, 'cancel'])->name('seller.order.cancel');
    Route::get('/seller/order/count-transaction', [SellerOrder::class, 'countTransaction'])->name('seller.order.count');

    Route::get('/seller/balance', [BalanceController::class, 'index'])->name('seller.balance');
    Route::get('/seller/balance/detail', [BalanceController::class, 'balance'])->name('seller.balance.detail');
    Route::get('/seller/balance/history', [BalanceController::class, 'history'])->name('seller.balance.history');

    Route::get('/seller/withdraw/history', [BalanceController::class, 'history_withdraw'])->name('seller.withdraw.history');
    // Route::post('/seller/withdraw', [BalanceController::class, 'withdraw'])->name('seller.withdraw');
    Route::post('/seller/inquiry', [DisbursementController::class, 'inquiry'])->name('seller.inquiry');
    Route::post('/seller/transfer', [DisbursementController::class, 'transfer'])->name('seller.transfer');

    Route::get('/seller/rating', [RatingController::class, 'index'])->name('seller.rating');
    Route::get('/seller/rating/list', [RatingController::class, 'rating_list'])->name('seller.rating.list');

    Route::get('seller/statistic', [StatisticController::class, 'statistik'])->name('seller.statistic');
});
// End Seller Router



// Admin Router
Route::group(['middleware' => ['role:admin', 'auth', 'verified']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    Route::get('/admin/products', [AdminProductController::class, 'index']);
    Route::get('/admin/product/create', [AdminProductController::class, 'create']);
    Route::get('/admin/products/publish', [AdminProductController::class, 'publish'])->name('admin.product.publish');
    Route::get('/admin/products/draft', [AdminProductController::class, 'draft'])->name('admin.product.draft');
    Route::get('/admin/product/edit/{slug}', [AdminProductController::class, 'edit'])->name('admin.product.edit');

    Route::post('/admin/product/create', [AdminProductController::class, 'store'])->name('admin.product.create');
    Route::put('/admin/product/update/{slug}', [AdminProductController::class, 'update'])->name('admin.product.update');

    Route::get('/admin/order', [AdminOrder::class, 'index'])->name('admin.order');
    Route::get('/admin/order/pending', [AdminOrder::class, 'pending'])->name('admin.order.pending');
    Route::get('/admin/order/terbayar', [AdminOrder::class, 'terbayar'])->name('admin.order.terbayar');
    Route::get('/admin/order/diproses', [AdminOrder::class, 'diproses'])->name('admin.order.diproses');
    Route::get('/admin/order/dikirim', [AdminOrder::class, 'dikirim'])->name('admin.order.dikirim');
    Route::get('/admin/order/selesai', [AdminOrder::class, 'selesai'])->name('admin.order.selesai');
    Route::get('/admin/order/batal', [AdminOrder::class, 'batal'])->name('admin.order.batal');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/customer', [UserController::class, 'customer'])->name('admin.users.customer');
    Route::get('/admin/users/seller', [UserController::class, 'seller'])->name('admin.users.seller');
    Route::delete('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');


    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/product_category', [CategoryController::class, 'category'])->name('admin.product.category');
    Route::get('/admin/category/sub_category', [CategoryController::class, 'sub_category'])->name('admin.product.sub_category');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('/admin/category/{id}', [CategoryController::class, 'subcat'])->name('admin.sub_category');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.sub_category.delete');


    Route::get('/admin/voucher', [AdminVoucherController::class, 'index'])->name('admin.voucher');
    Route::get('/admin/voucher/list', [AdminVoucherController::class, 'datatable'])->name('admin.voucher.list');
    Route::post('/admin/voucher', [AdminVoucherController::class, 'store'])->name('admin.voucher.store');


    Route::get('/admin/withdraw', [WithdrawController::class, 'index'])->name('admin.withdraw');
    Route::get('/admin/withdraw/history', [WithdrawController::class, 'history'])->name('admin.withdraw.history');
});
// End Admin Router
