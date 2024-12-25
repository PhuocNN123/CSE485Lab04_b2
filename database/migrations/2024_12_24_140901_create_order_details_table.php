<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamps();

            // Khóa ngoại tham chiếu đến bảng orders
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); // Xóa bản ghi order thì chi tiết đơn hàng cũng bị xóa

            // Khóa ngoại tham chiếu đến bảng products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Xóa sản phẩm thì chi tiết liên quan cũng bị xóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
