<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách đơn hàng phân trang, 5 bản ghi mỗi trang
        $orders = Order::with('customer', 'details.product')->paginate(5);
    
        // Trả về view và truyền dữ liệu $orders
        return view('orders.index', compact('orders'));
    }

    public function history()
    {
        // Lấy tất cả đơn hàng của khách hàng đã đăng nhập
        // Bạn có thể thay thế `auth()->user()` bằng cách lấy khách hàng tùy theo logic của bạn
        $orders = Order::where('customer_id', auth()->id()) // Giả sử bạn sử dụng auth để lấy khách hàng đã đăng nhập
                        ->with('details.product') // Lấy chi tiết đơn hàng cùng với sản phẩm
                        ->get();
        
        // Trả về view với thông tin các đơn hàng
        return view('orders.history', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
