<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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

// Home
Route::get('/', [HomeController::class, 'index'])->name('client.index');
Route::get('shop', [HomeController::class, 'shop'])->name('client.shop');
Route::get('detail/{id}', [HomeController::class, 'detail'])->name('client.detail');
Route::get('categories/{id}', [HomeController::class, 'categories'])->name('home.categories');
Route::get('search', [HomeController::class, 'searchProduct'])->name('home.search');


// Admin
Route::get('login', [AdminController::class,'login'])->name("admin.login");
Route::post('login', [AdminController::class,'login_check'])->name("admin.login_check");
Route::post('logout', [AdminController::class,'logout']);
Route::get('admin', [AdminController::class,'index'])->name("admin.index");

// Product Category Routing
Route::get('/admin/loaisp', [CategoryController::class,'loaisp_index'])->name("admin.loaisp.index");
Route::get('/admin/{id?}/xoaloai', [CategoryController::class,'loaisp_delete'])->name("admin.loaisp.delete");
Route::get('/admin/{id?}/showloai', [CategoryController::class,'loaisp_show'])->name("admin.loaisp.show");
Route::post('/admin/{id?}/updateloai', [CategoryController::class,'loaisp_update'])->name("admin.loaisp.update");
Route::get('/admin/newloai', [CategoryController::class,'loaisp_new'])->name("admin.loaisp.new");
Route::post('/admin/storeloai', [CategoryController::class,'loaisp_store'])->name("admin.loaisp.addnew");

// Product Routing
Route::get('/admin/sp', [ProductController::class,'sp_index'])->name("admin.sp.index");
Route::get('/admin/{id?}/xoasp', [ProductController::class,'sp_delete'])->name("admin.sp.delete");
Route::get('/admin/{id?}/showsp', [ProductController::class,'sp_show'])->name("admin.sp.show");
Route::post('/admin/{id?}/updatesp', [ProductController::class,'sp_update'])->name("admin.sp.update");
Route::get('/admin/newsp', [ProductController::class,'sp_new'])->name("admin.sp.new");
Route::post('/admin/storesp', [ProductController::class,'sp_store'])->name("admin.sp.addnew");

// Order Routing
Route::get('donhang', [OrderController::class, 'qldonhang'])->name('admin.qldonhang');
Route::get('donhangchitiet/{id}', [OrderController::class, 'qldonhangchitiet'])->name('admin.qldonhangchitiet');


// Cart Routing
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

// Checkout Routing
Route::get('thanhtoan', [CartController::class, 'thanhtoan'])->name('cart.thanhtoan');
Route::post('thanhtoan', [CartController::class, 'thanhtoan1'])->name('cart.thanhtoan1');



