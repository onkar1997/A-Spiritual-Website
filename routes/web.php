<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ContactsController;
use App\Http\Controllers\Frontend\BlogsController;
use App\Http\Controllers\Frontend\DarshansController;
use App\Http\Controllers\Frontend\SankirtansController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\AdminBlogsController;
use App\Http\Controllers\Admin\AdminDarshansController;
use App\Http\Controllers\Admin\AdminFeedbacksController;
use App\Http\Controllers\Admin\AdminSankirtansController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminUsersController;


// FRONTEND
Route::get('/', function () {
    return view('index');
});

Route::post('/insertContact', [ContactsController::class, 'store']);

Route::get('blogs', [BlogsController::class, 'index']);
Route::get('/blogs/{id}', [BlogsController::class, 'show']);

Route::get('/darshans', [DarshansController::class, 'index']);
Route::get('/darshans/{id}', [DarshansController::class, 'show']);

Route::get('/sankirtans', [SankirtansController::class, 'index']);
Route::get('/sankirtans/{id}', [SankirtansController::class, 'show']);

Route::get('/shop', [ProductsController::class, 'index']);
Route::get('/shop/product/{id}', [ProductsController::class, 'show']);



// Admin auth
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin-dashboard');

require __DIR__.'/adminauth.php';


// Cart
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('update-cart-item', [CartController::class, 'updateCart']);
Route::post('delete-cart-item', [CartController::class, 'destroy']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);
    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpayCheck']);
    Route::get('dashboard', [OrderController::class, 'index']);
    Route::get('view-order/{id}', [OrderController::class, 'view']);

});
require __DIR__.'/auth.php';


// BACKEND
// Admin - Blogs
Route::get('/admin/blogs', [AdminBlogsController::class, 'index']);
Route::get('/admin/blogs/addblog', [AdminBlogsController::class, 'create']);
Route::post('/admin/blogs/postblog', [AdminBlogsController::class, 'store'])->name('postblog');
Route::get('/admin/blogs/{id}/editblog', [AdminBlogsController::class, 'edit'])->name('editblog');
Route::put('/admin/blogs/{id}/updateblog', [AdminBlogsController::class, 'update'])->name('updateblog');
Route::get('/admin/blogs/{id}/deleteblog', [AdminBlogsController::class, 'destroy'])->name('deleteblog');

// Admin - Darshans
Route::get('/admin/darshans', [AdminDarshansController::class, 'index']);
Route::get('/admin/darshans/adddarshan', [AdminDarshansController::class, 'create']);
Route::post('/admin/darshans/postdarshan', [AdminDarshansController::class, 'store'])->name('postdarshan');
Route::get('/admin/darshans/{id}/editdarshan', [AdminDarshansController::class, 'edit'])->name('editdarshan');
Route::put('/admin/darshans/{id}/updatedarshan', [AdminDarshansController::class, 'update'])->name('updatedarshan');
Route::get('/admin/darshans/{id}/deletedarshan', [AdminDarshansController::class, 'destroy'])->name('deletedarshan');

// Admin - Feedbacks
Route::get('/admin/feedbacks', [AdminFeedbacksController::class, 'index']);
Route::get('/admin/feedbacks/{id}/deletefeedback', [AdminFeedbacksController::class, 'destroy'])->name('deletefeedback');

// Admin - Sankirtans
Route::get('/admin/sankirtans', [AdminSankirtansController::class, 'index']);
Route::get('/admin/sankirtans/addsankirtan', [AdminSankirtansController::class, 'create']);
Route::post('/admin/sankirtans/postsankirtan', [AdminSankirtansController::class, 'store'])->name('postsankirtan');
Route::get('/admin/sankirtans/{id}/editsankirtan', [AdminSankirtansController::class, 'edit'])->name('editsankirtan');
Route::put('/admin/sankirtans/{id}/updatesankirtan', [AdminSankirtansController::class, 'update'])->name('updatesankirtan');
Route::get('/admin/sankirtans/{id}/deletesankirtan', [AdminSankirtansController::class, 'destroy'])->name('deletesankirtan');

// Admin - Shops
Route::get('/admin/shop', [AdminProductsController::class, 'index']);
Route::get('/admin/shop/addproduct', [AdminProductsController::class, 'create']);
Route::post('/admin/shop/postproduct', [AdminProductsController::class, 'store'])->name('postproduct');
Route::get('/admin/shop/{id}/editproduct', [AdminProductsController::class, 'edit'])->name('editproduct');
Route::put('/admin/shop/{id}/updateproduct', [AdminProductsController::class, 'update'])->name('updateproduct');
Route::get('/admin/shop/{id}/deleteproduct', [AdminProductsController::class, 'destroy'])->name('deleteproduct');

// Admin - Orders
Route::get('admin/orders', [AdminOrdersController::class, 'index']);
Route::get('admin/orders/view-order/{id}', [AdminOrdersController::class, 'view']);
Route::put('update-order/{id}', [AdminOrdersController::class, 'update']);

Route::get('admin/orders/order-history/view-order/{id}', [AdminOrdersController::class, 'view']);
Route::get('admin/orders/order-history', [AdminOrdersController::class, 'orderhistory']);
Route::get('delete-orderhistory/{id}', [AdminOrdersController::class, 'destroy']);

// Admin - Users
Route::get('admin/users', [AdminUsersController::class, 'index']);
Route::get('admin/users/view-user/{id}', [AdminUsersController::class, 'view']);


