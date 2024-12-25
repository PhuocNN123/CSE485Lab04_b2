@extends('layouts.app')

@section('title', 'Lịch sử đơn hàng')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lịch sử đơn hàng của khách hàng</h1>

        <!-- Bảng hiển thị lịch sử đơn hàng -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Sản phẩm</th>
                    <th>Tổng số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            @foreach($order->details as $detail)
                                {{ $detail->product->name }} ({{ $detail->quantity }}), 
                            @endforeach
                        </td>
                        <td>{{ $order->details->sum('quantity') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Liên kết phân trang -->
        <div class="d-flex justify-content-center mt-3">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
