<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Route users
 */
Route::middleware('auth')->group(function () {
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
Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('product', ProductController::class)->middleware('auth');
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
 * Route order
 */

Route::resource('order', OrderController::class);


require __DIR__.'/auth.php';
