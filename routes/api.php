<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\OngkosKirimController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // dd($request);
    return $request->user();
});

// Route If Not Logged In
Route::get('unauthorized', function () {
    return response()->json(['error' => 'Unauthorized.'], 401);
})->name('unauthorized');

Route::controller(LoginController::class)->group(function () {
    Route::post('login', 'login');
});

Route::get('/ongkir/check', [OngkosKirimController::class, 'check']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('wishlist', WishlistController::class);
    // Route::resource('cart', CartController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('category', CategoryController::class);
    // Route::resource('payment', OrderController::class);
    // Route::resource('chat', ChatController::class);

    // Cart
    Route::get('/cart', [CartController::class, 'index']);

    // Order
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order/{id}', [OrderController::class, 'show']);
    Route::post('/payment', [OrderController::class, 'store']);
    Route::post('/payment/methods', [OrderController::class, 'methods']);


    // Chat
    Route::get('/chat', [ChatController::class, 'index']);

    // Address
    Route::get('/user/address', [ProfileController::class, 'addresses']);

    Route::post('/profile/update/{id}', [ProfileController::class, 'updateProfil']);
    Route::post('/profile/change_password/{id}', [ProfileController::class, 'update_password']);
    Route::post('/profile/update_rekening/{id}', [ProfileController::class, 'updateRekening']);

    Route::any('{segment}', function () {
        return response()->json([
            'success' => false,
            'message' => 'Bad request url.',
        ], 400);
    })->where('segment', '.*');
});
