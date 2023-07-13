<?php

use App\Http\Controllers\Customers\CartController;
use App\Http\Controllers\Customers\CheckoutController;
use App\Http\Controllers\Customers\Custom\CheckoutCustomController;
use App\Http\Controllers\Customers\Custom\CustomBatikController;
use App\Http\Controllers\Customers\Custom\ListOrderController;
use App\Http\Controllers\Customers\HistoryController;
use App\Http\Controllers\Customers\HistoryOrderController;
use App\Http\Controllers\Customers\HomeController;
use App\Http\Controllers\Customers\ProductController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\HistoryController as StaffHistoryController;
use App\Http\Controllers\Staff\ListProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/cart', function () {
//     return view('customers.cart');
// });
Route::get('/wishlist', function () {
    return view('customers.wishlist');
});
Route::get('/checkout', function () {
    return view('customers.checkout');
});
Route::get('/history-order', function () {
    return view('customers.history-order');
});

Route::get('/history-detail', function () {
    return view('customers.history-detail');
});


Route::get('/detail-riwayat-pesanan', function () {
    return view('stores.history.detail-history');
});
// Route::get('/edit-product', function () {
//     return view('staff.products.edit');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['as' => 'homepage.'], function () {
    Route::get('/belanja', [ProductController::class, 'index'])->name('shop');
    Route::get('/detail-product/{id}', [ProductController::class, 'detail']);
});

Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'cart.'], function () {
        Route::get('/cart', [CartController::class, 'index'])->name('index');
        Route::post('/add-to-cart/{id}', [CartController::class, 'addCart'])->name('add');
        Route::get('/remove-from-cart/{id}', [CartController::class, 'destroy'])->name('remove');
    });
    Route::group(['as' => 'checkout.'], function () {
        Route::post('/checkout-batik', [CheckoutController::class, 'index'])->name('index');
        Route::post('/checkout-data', [CheckoutController::class, 'store'])->name('store');
    });
    Route::group(['as' => 'history-order.'], function () {
        Route::get('/riwayat-order', [HistoryOrderController::class, 'index'])->name('index');
        Route::get('/riwayat-detail/{id}', [HistoryOrderController::class, 'detail'])->name('detail');
    });
    // Route::group(['as' => 'customers.'], function () {
    //     Route::get('data-customer', [CustomerController::class, 'index']);
    //     Route::get('create-customer', [CustomerController::class, 'create'])->name('create');
    //     Route::get('edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit');
    //     Route::post('store-customer', [CustomerController::class, 'store'])->name('store');
    //     Route::put('update-customer/{id}', [CustomerController::class, 'update'])->name('update');
    //     Route::get('delete-customer/{id}', [CustomerController::class, 'destroy'])->name('delete');
    // });
    Route::group(['as' => 'custom.'], function () {
        Route::get('/list-produk-custom', [CustomBatikController::class, 'index'])->name('index');
        Route::post('/custom-batik/{id}', [CustomBatikController::class, 'details'])->name('details');

        Route::get('/list-order', [ListOrderController::class, 'index'])->name('orders');
        Route::post('/add-to-list/{id}', [ListOrderController::class, 'addList'])->name('add');
        Route::get('/remove-from-list/{id}', [ListOrderController::class, 'destroy'])->name('remove');

        Route::post('/checkout', [CheckoutCustomController::class, 'checkout'])->name('checkout');
        Route::post('/checkout-data', [CheckoutCustomController::class, 'store'])->name('store');
    });

    Route::group(['as' => 'categories.'], function () {
        Route::get('/data-category', [CategoryController::class, 'index']);
        Route::get('/create-category', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/store-category', [CategoryController::class, 'store'])->name('store');
        Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });
});
// staff

Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'reports.'], function () {
        Route::get('data-reports', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('detail-reports/{id}', [DashboardController::class, 'detail'])->name('details');
        Route::put('update-reports/{id}', [DashboardController::class, 'update'])->name('update');
        Route::get('delete-reports/{id}', [DashboardController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'products.'], function () {
        Route::get('data-product', [ListProductController::class, 'index'])->name('dashboard');
        Route::get('create-product', [ListProductController::class, 'create'])->name('create');
        Route::get('edit-product/{id}', [ListProductController::class, 'edit'])->name('edit');
        Route::post('store-product', [ListProductController::class, 'store'])->name('store');
        Route::put('update-product/{id}', [ListProductController::class, 'update'])->name('update');
        Route::get('delete-product/{id}', [ListProductController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'history.'], function () {
        Route::get('/data-history', [StaffHistoryController::class, 'index'])->name('dashboard');
        Route::get('/edit-history/{id}', [HistoryController::class, 'edit'])->name('edit');
        Route::put('/update-history/{id}', [HistoryController::class, 'update'])->name('update');
        Route::get('/delete-history/{id}', [HistoryController::class, 'destroy'])->name('delete');
    });
});

require __DIR__ . '/auth.php';
