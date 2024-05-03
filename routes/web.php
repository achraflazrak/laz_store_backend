<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubcategoryController;

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

Route::get('/', [AdminController::class,'login'])->name('admin.login');
Route::post('/auth', [AdminController::class,'auth'])->name('admin.auth');

Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [AdminController::class,'index'])
        ->name('admin.index');
        Route::resource('categories',CategoryController::class, [
            'names' => [
                'index' => 'admin.categories.index',
                'create' => 'admin.categories.create',
                'store' => 'admin.categories.store',
                'edit' => 'admin.categories.edit',
                'update' => 'admin.categories.update',
                'destroy' => 'admin.categories.destroy'
            ]
        ]);
        Route::resource('subcategories',SubcategoryController::class, [
            'names' => [
                'index' => 'admin.subcategories.index',
                'create' => 'admin.subcategories.create',
                'store' => 'admin.subcategories.store',
                'edit' => 'admin.subcategories.edit',
                'update' => 'admin.subcategories.update',
                'destroy' => 'admin.subcategories.destroy'
            ]
        ]);
        Route::resource('products',ProductController::class, [
            'names' => [
                'index' => 'admin.products.index',
                'create' => 'admin.products.create',
                'store' => 'admin.products.store',
                'edit' => 'admin.products.edit',
                'update' => 'admin.products.update',
                'destroy' => 'admin.products.destroy'
            ]
        ]);
        Route::resource('coupons',CouponController::class, [
            'names' => [
                'index' => 'admin.coupons.index',
                'create' => 'admin.coupons.create',
                'store' => 'admin.coupons.store',
                'edit' => 'admin.coupons.edit',
                'update' => 'admin.coupons.update',
                'destroy' => 'admin.coupons.destroy'
            ]
        ]);

        Route::get('users', [UserController::class, 'index'])
            ->name('admin.users.index');
        Route::delete('user/{user}/delete', [UserController::class, 'destroy'])
            ->name('admin.users.destroy');

        Route::get('orders', [OrderController::class, 'index'])
            ->name('admin.orders.index');
        Route::get('edit/{order}/{status}/orders', [OrderController::class, 'edit'])
            ->name('admin.orders.edit');
        Route::delete('order/{order}/delete', [OrderController::class, 'destroy'])
            ->name('admin.orders.destroy');
        Route::put('return/{order}/order', [OrderController::class, 'handleReturnedOrder'])
            ->name('admin.orders.returned');
        Route::get('generate/{order}/invoice', [OrderController::class, 'generateOrderAsPdf'])
            ->name('admin.orders.invoice');

        Route::get('reviews', [ReviewController::class, 'index'])
            ->name('admin.reviews.index');
        Route::get('edit/{review}/{status}/reviews', [ReviewController::class, 'toggleReviewStatus'])
            ->name('admin.reviews.edit');
        Route::delete('delete/{review}/reviews', [ReviewController::class, 'destroy'])
            ->name('admin.reviews.destroy');

        Route::post('logout', [AdminController::class,'logout'])
            ->name('admin.logout');

    });

});
