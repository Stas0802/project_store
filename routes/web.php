<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

/**
 * Route dashboard
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['if.not.auth', 'verified'])->name('dashboard');

/**
 * Rote profile
 */
Route::middleware('if.not.auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Route users
 */
Route::middleware('if.not.auth')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

/**
 *  Route products and category
 */
Route::resource('category', CategoryController::class)->middleware('if.not.auth');
Route::resource('product', ProductController::class)->middleware( 'if.not.auth');

/**
 * Route content
 */
Route::get('/catalog/category/{category}', [CatalogController::class, 'show'])->name('category.product');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

/**
 * Route cart
 */
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');

/**
 * Route order and OrderProduct
 */
Route::patch('/orderProduct/{order}/products', [OrderProductController::class, 'updateProductInOrder'])
    ->middleware('if.not.auth')
    ->name('orderProduct.updateProduct');

Route::delete('/orderProduct/{order}/product/{product}', [OrderProductController::class, 'deleteProductFromOrder'])
    ->middleware('if.not.auth')
    ->name('orderProduct.deleteProduct');

Route::get('/orderProduct/{order}', [OrderProductController::class, 'edit'])
    ->middleware('if.not.auth')
    ->name('orderProduct.edit');

/**
 * Route thank you page
 */
Route::get('/order/thank-you-page', function (){
    return view('order.thank-you-page');
})->name('order.thank-you-page');

Route::resource('order', OrderController::class)->middleware('if.not.auth');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

/**
 * Route status update
 */

Route::patch('/order/{order}/status',[OrderController::class, 'updateStatus'])
    ->name('order.updateStatus')
    ->middleware('if.not.auth');




require __DIR__.'/auth.php';
