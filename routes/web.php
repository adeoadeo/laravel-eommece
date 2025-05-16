<?php

use GuzzleHttp\Middleware;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;


Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->Middleware('auth','admin');

Route::get('view_category', [AdminController::class, 'view_category'])->Middleware('auth','admin');

Route::post('add_category', [AdminController::class, 'add_category'])->Middleware('auth','admin');

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->Middleware('auth','admin');

Route::get('edit_category_view/{id}', [AdminController::class, 'edit_category_view'])->Middleware('auth','admin');

Route::post('update_category/{id}', [AdminController::class, 'update_category'])->Middleware('auth','admin');

Route::get('add_product_view', [AdminController::class, 'add_product_view'])->Middleware('auth','admin');

Route::post('upload_product', [AdminController::class, 'upload_product'])->Middleware('auth','admin');

Route::get('view_product', [AdminController::class, 'view_product'])->Middleware('auth','admin');

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->Middleware('auth','admin');

Route::get('update_product/{id}', [AdminController::class, 'update_product'])->Middleware('auth','admin');

Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->Middleware('auth','admin');

Route::get('product_search', [AdminController::class, 'product_search'])->Middleware('auth','admin');
Route::get('product_details/{id}', [HomeController::class, 'product_details']);

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

Route::get('myCart', [HomeController::class,'myCart'])->middleware(['auth', 'verified']);

Route::get('delete_cart/{id}', [HomeController::class,'delete_cart'])->middleware(['auth', 'verified']);

Route::post('confirm_order', [HomeController::class,'confirm_order'])->middleware(['auth', 'verified']);

Route::get('view_order', [AdminController::class,'view_order'])->Middleware('auth','admin');

Route::get('on_the_way/{id}', [AdminController::class,'on_the_way'])->Middleware('auth','admin');

Route::get('delivered/{id}', [AdminController::class,'delivered'])->Middleware('auth','admin');

Route::get('print_pdf/{id}', [AdminController::class,'print_pdf'])->Middleware('auth','admin');

Route::get('myOrders', [HomeController::class,'myOrders'])->middleware(['auth', 'verified']);

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});






