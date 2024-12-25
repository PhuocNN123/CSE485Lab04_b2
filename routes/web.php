<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Chọn view hiển thị mặc định
    return view('products.app');
});

// Route cho Customer
Route::resource('customers', CustomerController::class);

// Route cho Product
Route::resource('products', ProductController::class);

// Route cho Order
Route::resource('orders', OrderController::class);

// Định nghĩa route cho lịch sử đơn hàng
Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
