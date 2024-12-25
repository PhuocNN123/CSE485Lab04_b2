<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
Route::get('/', function () {
    return view('product.app');
}
Route::resource('products', ProductController::class); 
Route::resource('orders', OrderController::class);
Route::resource('customers', CustomerController::class);
