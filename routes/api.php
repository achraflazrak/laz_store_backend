<?php

use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return [
            'user' => $request->user()->load('orders'),
            'currentToken' => $request->bearerToken(),
        ];
    });
    Route::post('user/logout', [UserController::class, 'logout']);
    Route::put('user/update/{user}', [UserController::class, 'updateUserProfile']);

    Route::post('store/review', [ReviewController::class, 'store']);
    Route::put('update/review', [ReviewController::class, 'updateReview']);
    Route::post('delete/review', [ReviewController::class, 'deleteReview']);
    Route::post('apply/coupon', [CouponController::class, 'applyCoupon']);
    Route::post('order/store', [OrderController::class, 'store']);
    Route::post('order/pay', [OrderController::class, 'payByStripe']);

});

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::get('category/{category}/products', [ProductController::class, 'getProductByCategory']);
Route::get('subcategory/{subcategory}/products', [ProductController::class, 'getProductBySubcategory']);
Route::post('search/products', [ProductController::class, 'searchQuery']);
Route::post('filter/products', [ProductController::class, 'getProductsByFilters']);

Route::post('user/register', [UserController::class, 'store']);
Route::post('user/login', [UserController::class, 'auth']);
