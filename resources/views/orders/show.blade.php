@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Chi tiết đơn hàng: #{{ $order->id }}</h1>

    <div class="mb-3">
        <h3>Thông tin khách hàng</h3>
        <p><strong>Tên khách hàng:</strong> {{ $order->customer->name }}</p>
        <p><strong>Địa chỉ:</strong> {{ $order->customer->address }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->customer->phone }}</p>
        <p><strong>Email:</strong> {{ $order->customer->email }}</p>
    </div>

    <div class="mb-3">
        <h3>Thông tin đơn hàng</h3>
        <p><strong>Ngày đặt hàng:</strong> {{ $order->order_date }}</p>
        <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
    </div>

    <h3>Chi tiết sản phẩm</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
