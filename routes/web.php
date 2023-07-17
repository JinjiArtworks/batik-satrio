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
use App\Http\Controllers\Customers\ProfileController;
use App\Http\Controllers\Customers\ReturnController;
use App\Http\Controllers\Customers\WishlistController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\HistoryController as StaffHistoryController;
use App\Http\Controllers\Staff\ListProductController;
use App\Http\Controllers\Staff\ReturnOrderController;
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


// Route::get('/edit-product', function () {
//     return view('staff.products.edit');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sejarah', function () {
    return view('customers.sejarah.index');
});
Route::group(['as' => 'homepage.'], function () {
    Route::get('/belanja', [ProductController::class, 'index'])->name('shop');
    Route::get('/detail-product/{id}', [ProductController::class, 'detail']);
});

Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'products.'], function () {
        Route::post('/store-wishlist', [ProductController::class, 'store'])->name('wishlist');
    });
    Route::group(['as' => 'wishlist.'], function () {
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('index');
        Route::get('/remove-wishilist', [WishlistController::class, 'destroy'])->name('remove');
    });
    Route::group(['as' => 'profile.'], function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('index');
        Route::post('/update-profile', [ProfileController::class, 'update'])->name('update');
    });
    Route::group(['as' => 'cart.'], function () {
        Route::get('/cart', [CartController::class, 'index'])->name('index');
        Route::get('/remove-from-cart/{id}', [CartController::class, 'destroy'])->name('remove');
        Route::post('/add-to-cart/{id}', [CartController::class, 'addCart'])->name('add');
        Route::post('/update-cart', [CartController::class, 'update'])->name('update');
    });
    Route::group(['as' => 'checkout.'], function () {
        Route::post('/checkout-batik', [CheckoutController::class, 'index'])->name('index');
        Route::post('/checkout-batik/payments', [CheckoutController::class, 'store'])->name('store');
    });
    Route::group(['as' => 'history-order.'], function () {
        Route::get('/history-order', [HistoryOrderController::class, 'index'])->name('index');
        Route::get('/history-detail/{id}', [HistoryOrderController::class, 'detail'])->name('detail');
        Route::post('/send-review/{id}', [HistoryOrderController::class, 'store'])->name('review');
        Route::post('/send-returns/{id}', [HistoryOrderController::class, 'storeReturns'])->name('returns');
        Route::post('/send-returns-back/{id}', [HistoryOrderController::class, 'storeReturnsBack'])->name('sendReturnsBack');
        Route::post('/accept-item/{id}', [HistoryOrderController::class, 'acceptOrder'])->name('acceptOrder');
    });

    Route::group(['as' => 'custom.'], function () {
        Route::get('/list-produk-custom', [CustomBatikController::class, 'index'])->name('index');
        Route::post('/custom-batik/{id}', [CustomBatikController::class, 'details'])->name('details');

        Route::get('/list-order', [ListOrderController::class, 'index'])->name('orders');
        Route::post('/add-to-list/{id}', [ListOrderController::class, 'addList'])->name('add');
        Route::get('/remove-from-list/{id}', [ListOrderController::class, 'destroy'])->name('remove');

        Route::post('/checkout-custom', [CheckoutCustomController::class, 'checkout'])->name('checkout');
        Route::post('/checkout-custom/payments-custom', [CheckoutCustomController::class, 'store'])->name('store');
    });

    // Route::group(['as' => 'categories.'], function () {
    //     Route::get('/data-category', [CategoryController::class, 'index']);
    //     Route::get('/create-category', [CategoryController::class, 'create'])->name('create');
    //     Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit');
    //     Route::post('/store-category', [CategoryController::class, 'store'])->name('store');
    //     Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update');
    //     Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete');
    // });
});



// staff
Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'reports.'], function () {
        Route::get('data-reports', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('detail-reports/{id}', [DashboardController::class, 'detail'])->name('details');
        Route::put('update-reports/{id}', [DashboardController::class, 'update'])->name('update');
        Route::put('update-custom-reports/{id}', [DashboardController::class, 'updateCustom'])->name('update-custom');
        Route::get('delete-reports/{id}', [DashboardController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'products.'], function () {
        Route::get('data-product', [ListProductController::class, 'index'])->name('dashboard');
        Route::get('/details-products/{id}', [ListProductController::class, 'details'])->name('details');
        Route::get('create-product', [ListProductController::class, 'create'])->name('create');
        Route::get('edit-product/{id}', [ListProductController::class, 'edit'])->name('edit');
        Route::post('store-product', [ListProductController::class, 'store'])->name('store');
        Route::put('update-product/{id}', [ListProductController::class, 'update'])->name('update');
        Route::get('delete-product/{id}', [ListProductController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'history.'], function () {
        Route::get('/data-history', [StaffHistoryController::class, 'index'])->name('dashboard');
        Route::get('/details-history/{id}', [StaffHistoryController::class, 'detail'])->name('details');
        // Route::put('/update-history/{id}', [HistoryController::class, 'update'])->name('update');
        // Route::get('/delete-history/{id}', [HistoryController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'return.'], function () {
        Route::get('/data-return', [ReturnOrderController::class, 'index'])->name('index');
        Route::get('/details-return/{id}', [ReturnOrderController::class, 'detail'])->name('details');
        Route::put('/update-return/{id}', [ReturnOrderController::class, 'update'])->name('update');
        Route::post('/confirm-return/{id}', [ReturnOrderController::class, 'confirmReturn'])->name('confirm');
        Route::get('/delete-return/{id}', [ReturnOrderController::class, 'destroy'])->name('delete');
    });
});

require __DIR__ . '/auth.php';
