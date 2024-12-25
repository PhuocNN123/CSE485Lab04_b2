<!-- resources/views/books/show.blade.php -->

@extends('product.app')  <!-- Kế thừa layout chính -->

@section('content')
    <div class="container">
        <h1>Thông tin sản phẩm</h1>

        <!-- Hiển thị thông tin của quyển sách -->
        <div class="card">
            <div class="card-header">
                <h3>{{ $products->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Mô Tả:</strong> {{ $products-> description}}</p>
                <p><strong>Giá:</strong> {{ $products->price }}</p>
                <p><strong>Số lượng:</strong> {{ $products->quantity }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
                <a href="{{ route('products.edit', $products->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                <form action="{{ route('products.destroy', $products->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </div>
        </div>
    </div>
@endsection
