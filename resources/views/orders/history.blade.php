@extends('layouts.app')

@section('title', 'Lịch sử đơn hàng')

@section('content')
    <div class="container">
        <h1 class="mb-4">Lịch sử đơn hàng của bạn</h1>

        @if($orders->isEmpty())
            <p>Không có đơn hàng nào trong lịch sử của bạn.</p>
        @else
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
        @endif
    </div>
@endsection
