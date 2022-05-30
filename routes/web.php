<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/login', function () {
    return view('login');
})->middleware('prevent-back-history');

Route::post('/login', [UserController::class, 'login'])->name('login');

// Route::group(['middleware' => ['auth:web']], function() {
    Route::get('/', [ProductController::class, 'index'])->name('index')->middleware('prevent-back-history');
    Route::get('/detail/{id}', [DetailController::class, 'index']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/add_to_cart', [ProductController::class, 'addToCart']);
    Route::get('/search', [ProductController::class, 'search']);
    Route::get('/cart_list', [ProductController::class, 'cartList'])->name('cartlist');
    Route::get('/ordernow', [ProductController::class, 'orderNow'])->name('orderNow');
    Route::get('/remove_cart/{id}', [ProductController::class, 'remove'])->name('remove_cart');
    Route::post('/orderplace', [ProductController::class, 'OrderPlace'])->name('OrderPlace');
    Route::get('/myorders', [ProductController::class, 'myOrder'])->name('myOrder');
// });