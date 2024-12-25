<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Models\customer;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('product.app');
});
Route::resource('products', ProductController::class); 
Route::resource('orders', OrderController::class); 
Route::resource('customers', CustomerController::class);