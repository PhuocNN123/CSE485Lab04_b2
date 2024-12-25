<!-- resources/views/books/edit.blade.php -->

@extends('product.app')  <!-- Kế thừa layout chính -->

@section('content')
    <div class="container">
        <h1>Chỉnh sửa thông tin sản phẩm</h1>

        <!-- Hiển thị thông báo nếu có -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form chỉnh sửa sách -->
        <form action="{{ route('products.update', $products->id) }}" method="POST">
            @csrf
            @method('PUT')  <!-- Xác định rằng đây là một yêu cầu PUT để cập nhật dữ liệu -->
            
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $products->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $products->description) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $products->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $products->quantity) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
