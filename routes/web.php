<?php

use App\Http\Controllers\Customers\CartController;
use App\Http\Controllers\Customers\CheckoutController;
use App\Http\Controllers\Customers\Custom\CheckoutCustomController;
use App\Http\Controllers\Customers\Custom\CustomBatikController;
use App\Http\Controllers\Customers\Custom\ListOrderController;
use App\Http\Controllers\Customers\HistoryOrderController;
use App\Http\Controllers\Customers\HomeController;
use App\Http\Controllers\Customers\ProductController;
use App\Http\Controllers\Customers\ProfileController;
use App\Http\Controllers\Customers\ViewBlogController;
use App\Http\Controllers\Customers\WishlistController;
use App\Http\Controllers\Staff\BlogController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\StaffHistoryController;
use App\Http\Controllers\Staff\ListProductController;
use App\Http\Controllers\Staff\Resources\AddBahanController;
use App\Http\Controllers\Staff\Resources\AddCustomController;
use App\Http\Controllers\Staff\Resources\AddModelController;
use App\Http\Controllers\Staff\Resources\AddMotifController;
use App\Http\Controllers\Staff\Resources\AddResultsController;
use App\Http\Controllers\Staff\Resources\AddStockController;
use App\Http\Controllers\Staff\Resources\AddTeknikController;
use App\Http\Controllers\Staff\Resources\AddWarnaController;
use App\Http\Controllers\Staff\ReturnOrderController;
use App\Http\Controllers\Staff\Resources\ListItemController;
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
Route::get('/sejarah', [ViewBlogController::class, 'index'])->name('index');
Route::group(['as' => 'homepage.'], function () {
    Route::get('/belanja', [ProductController::class, 'index'])->name('shop');
    Route::get('/detail-product/{id}', [ProductController::class, 'detail']);
});

Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'products.'], function () {
        Route::post('/store-wishlist', [ProductController::class, 'store'])->name('wishlist');
        Route::get('/belanja', [ProductController::class, 'search'])->name('search');
        // Route::post('/top-up-saldo/{id}', [ProductController::class, 'topupSaldo'])->name('topupSaldo');
        // Route::get('/belanja', [ProductController::class, 'searchByCat'])->name('searchByCat');
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
        Route::get('/orders-delete/{id}', [HistoryOrderController::class, 'remove'])->name('delete');
        Route::post('/send-review/{id}', [HistoryOrderController::class, 'store'])->name('review');
        Route::post('/send-returns/{id}', [HistoryOrderController::class, 'storeReturns'])->name('returns');
        Route::post('/send-returns-back/{id}', [HistoryOrderController::class, 'storeReturnsBack'])->name('sendReturnsBack');
        Route::post('/accept-item/{id}', [HistoryOrderController::class, 'acceptOrder'])->name('acceptOrder');
    });

    Route::group(['as' => 'custom.'], function () {
        Route::get('/list-produk-custom', [CustomBatikController::class, 'index'])->name('index');
        // Route::post('/custom-check/{id}', [CustomBatikController::class, 'check'])->name('check');
        // Route::post('/custom-check-results', [CustomBatikController::class, 'checkResults'])->name('checkResults');
        Route::post('/custom-batik', [CustomBatikController::class, 'details'])->name('details');


        Route::get('/list-order', [ListOrderController::class, 'index'])->name('orders');
        Route::post('/add-to-list', [ListOrderController::class, 'addList'])->name('add');
        // Route::post('/add-custom-list/{id}', [ListOrderController::class, 'addCustom'])->name('add-custom');
        Route::get('/remove-from-list/{id}', [ListOrderController::class, 'destroy'])->name('remove');

        Route::post('/checkout-custom', [CheckoutCustomController::class, 'checkout'])->name('checkout');
        Route::post('/checkout-custom/payments-custom', [CheckoutCustomController::class, 'store'])->name('store');
    });

});



// staff
Route::middleware(['auth'])->group(function () {
    Route::group(['as' => 'reports.'], function () {
        Route::get('data-reports', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('detail-reports/{id}', [DashboardController::class, 'detail'])->name('details');
        Route::put('update-reports/{id}', [DashboardController::class, 'update'])->name('update');
        Route::put('update-custom-status/{id}', [DashboardController::class, 'updateCustom'])->name('updateCustom');
        Route::put('update-return-reports/{id}', [DashboardController::class, 'updateReturn'])->name('update-return');
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
    Route::group(['as' => 'blog.'], function () {
        Route::get('data-blog', [BlogController::class, 'index'])->name('index');
        Route::post('store-blog', [BlogController::class, 'store'])->name('store-blog');
        Route::get('edit-blog/{id}', [BlogController::class, 'edit'])->name('edit-blog');
        Route::put('update-blog/{id}', [BlogController::class, 'update'])->name('update-blog');
        Route::get('delete-blog/{id}', [BlogController::class, 'destroy'])->name('delete-blog');
    });

    Route::group(['as' => 'return.'], function () {
        Route::get('/data-return', [ReturnOrderController::class, 'index'])->name('index');
        Route::get('/details-return/{id}', [ReturnOrderController::class, 'details'])->name('details');
        Route::put('/update-return/{id}', [ReturnOrderController::class, 'update'])->name('update');
        Route::post('/confirm-return/{id}', [ReturnOrderController::class, 'confirmReturn'])->name('confirm');
        Route::get('/delete-return/{id}', [ReturnOrderController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'resources.'], function () {
        Route::get('data-resources', [ListItemController::class, 'index'])->name('dashboard');
        // MODELS
        Route::get('add-models', [AddModelController::class, 'index'])->name('dashboard');
        Route::post('store-models', [AddModelController::class, 'store'])->name('store-model');
        Route::get('edit-models/{id}', [AddModelController::class, 'edit'])->name('edit-model');
        Route::put('update-models/{id}', [AddModelController::class, 'update'])->name('update-model');
        Route::get('delete-models/{id}', [AddModelController::class, 'destroy'])->name('delete-model');

        Route::get('add-motif', [AddMotifController::class, 'index'])->name('dashboard');
        Route::post('store-motif', [AddMotifController::class, 'store'])->name('store-motif');
        Route::get('edit-motif/{id}', [AddMotifController::class, 'edit'])->name('edit-motif');
        Route::put('update-motif/{id}', [AddMotifController::class, 'update'])->name('update-motif');
        Route::get('delete-motif/{id}', [AddMotifController::class, 'destroy'])->name('delete-motif');

        Route::get('add-bahan', [AddBahanController::class, 'index'])->name('dashboard');
        Route::post('store-bahan', [AddBahanController::class, 'store'])->name('store-bahan');
        Route::get('edit-bahan/{id}', [AddBahanController::class, 'edit'])->name('edit-bahan'); 
        Route::put('update-bahan/{id}', [AddBahanController::class, 'update'])->name('update-bahan');
        Route::put('update-stock-bahan', [AddBahanController::class, 'updateStock'])->name('update-stock-bahan');
        Route::get('delete-bahan/{id}', [AddBahanController::class, 'destroy'])->name('delete-bahan');

        Route::get('add-teknik', [AddTeknikController::class, 'index'])->name('dashboard');
        Route::post('store-teknik', [AddTeknikController::class, 'store'])->name('store-teknik');
        Route::get('edit-teknik/{id}', [AddTeknikController::class, 'edit'])->name('edit-teknik');
        Route::put('update-teknik/{id}', [AddTeknikController::class, 'update'])->name('update-teknik');
        Route::get('delete-teknik/{id}', [AddTeknikController::class, 'destroy'])->name('delete-teknik');

        Route::get('add-warna', [AddWarnaController::class, 'index'])->name('dashboard');
        Route::post('store-warna', [AddWarnaController::class, 'store'])->name('store-warna');
        Route::get('edit-warna/{id}', [AddWarnaController::class, 'edit'])->name('edit-warna');
        Route::put('update-warna/{id}', [AddWarnaController::class, 'update'])->name('update-warna');
        Route::get('delete-warna/{id}', [AddWarnaController::class, 'destroy'])->name('delete-warna');

        // preview mungkin tidak diperlukan, nanti dihapus saja
        // Route::get('add-custom', [AddCustomController::class, 'index'])->name('dashboard');
        // Route::post('store-custom', [AddCustomController::class, 'store'])->name('store-custom');
        // Route::get('edit-custom/{id}', [AddCustomController::class, 'edit'])->name('edit-custom');
        // Route::put('update-custom/{id}', [AddCustomController::class, 'update'])->name('update-custom');
        // Route::get('delete-custom/{id}', [AddCustomController::class, 'destroy'])->name('delete-custom');

        Route::get('add-results', [AddResultsController::class, 'index'])->name('dashboard');
        Route::post('store-results', [AddResultsController::class, 'store'])->name('store-results');
        Route::get('edit-results/{id}', [AddResultsController::class, 'edit'])->name('edit-results');
        Route::put('update-results/{id}', [AddResultsController::class, 'update'])->name('update-results');
        Route::get('delete-results/{id}', [AddResultsController::class, 'destroy'])->name('delete-results');

    });
});

require __DIR__ . '/auth.php';
