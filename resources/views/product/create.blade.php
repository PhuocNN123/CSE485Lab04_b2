@extends('product.app') <!-- Kế thừa layout chính -->

@section('content')
    <div class="container">
        <h1>Thêm mới product</h1>
        
        <!-- Form để thêm sách -->
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm </label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <input type="text" name="description" class="form-control" id="description" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="text" name="price" class="form-control" id="price" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" class="form-control" id="quantity" required>
            </div>

            <button type="submit" class="btn btn-primary">Thêm Sản phẩm</button>
        </form>
    </div>
@endsection
