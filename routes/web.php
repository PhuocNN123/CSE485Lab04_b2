<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('customers.App');
});

// Route cho Customer
Route::resource('customers', CustomerController::class);

// Route cho Order
Route::resource('orders', OrderController::class);

// Định nghĩa route cho lịch sử đơn hàng
Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
