@extends('layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Danh sách đơn hàng</h1>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID Đơn hàng</th>
                <th>Khách hàng</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Sản phẩm</th>
                <th>Tổng số lượng</th>
                <th>Lịch sử khách hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        @foreach($order->details as $detail)
                            {{ $detail->product->name }} ({{ $detail->quantity }}), 
                        @endforeach
                    </td>
                    <td>{{ $order->details->sum('quantity') }}</td>
                    <td>
                          <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Xem</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
