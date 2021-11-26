<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\OrderController;
use App\Http\Controllers\Shop\UserController;
use App\View\Components\ListingCategory;
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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', '\App\Http\Controllers\Admin\CategoryController');
    Route::resource('/products', '\App\Http\Controllers\Admin\ProductController');
    Route::resource('/attributes', '\App\Http\Controllers\Admin\AttributeController');
    Route::resource('/brands', '\App\Http\Controllers\Admin\BrandController');
    Route::resource('/orders', '\App\Http\Controllers\Admin\OrderController');
    Route::resource('/users', '\App\Http\Controllers\Admin\UserController');
    Route::resource('/pages', '\App\Http\Controllers\Admin\PageController');
    Route::post('/product/import', ['\App\Http\Controllers\Import\ProductController', 'import'])->name('product.import');
    Route::post('/product/delete/import', ['\App\Http\Controllers\Import\ProductDeleteController', 'import'])->name('product.delete.import');
});


Route::get('/', [\App\Http\Controllers\Shop\MainController::class, 'index']);

Route::get('/catalog/{slug?}', [\App\Http\Controllers\Shop\CategoryController::class, 'index'])->name('category');
Route::post('/catalog/{slug?}', [ListingCategory::class, 'update'])->name('category.filter');

Route::get('/product/{slug}', [\App\Http\Controllers\Shop\ProductController::class, 'index'])->name('product');
Route::get('/brand/{slug?}', [\App\Http\Controllers\Shop\BrandController::class, 'index'])->name('brand');

Route::get('/about', [\App\Http\Controllers\Shop\AboutController::class, 'index'])->name('about');
Route::get('/contact', [\App\Http\Controllers\Shop\ContactController::class, 'index'])->name('contact');
Route::get('/delivery', [\App\Http\Controllers\Shop\DeliveryController::class, 'index'])->name('delivery');
Route::get('/garant', [\App\Http\Controllers\Shop\GarantController::class, 'index'])->name('garant');
Route::get('/payment', [\App\Http\Controllers\Shop\PaymentController::class, 'index'])->name('payment');
Route::get('/search', [\App\Http\Controllers\Shop\SearchController::class, 'index'])->name('search');
Route::get('/swap', [\App\Http\Controllers\Shop\SwapController::class, 'index'])->name('swap');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'addCart'])->name('cart.add');
Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/count', [CartController::class, 'countCart'])->name('cart.count');

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'order'])->name('order.order');
Route::post('/order/success', [OrderController::class, 'success'])->name('order.success');

Route::get('/terms', function () {
   return view('shop.terms');
})->name('terms');

Route::post('/callback', [\App\Http\Controllers\Shop\MainController::class, 'callback'])->name('callback');

Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
