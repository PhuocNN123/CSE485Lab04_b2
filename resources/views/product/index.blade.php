@extends('product.app')
@section('content')
<div class="container">
    <h1>Danh sách Sản Phẩm</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Name</th>
                <th>description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @php
             $i=($products->currentPage() - 1) * $products->perPage() + 1; 
            @endphp
            @foreach ($products as $product)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>

                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">Xem</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection