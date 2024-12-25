<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'name' => $faker->words(3, true), // Tên sản phẩm (3 từ)
                'description' => $faker->sentence(10), // Mô tả sản phẩm (10 từ)
                'price' => $faker->randomFloat(2, 10, 1000), // Giá sản phẩm (từ 10 đến 1000, 2 chữ số thập phân)
                'quantity' => $faker->numberBetween(1, 100), // Số lượng (1 đến 100)
                'created_at' => now(), // Thời gian tạo
                'updated_at' => now(), // Thời gian cập nhật
            ]);
        }
        foreach (range(1, 10) as $index) {
            DB::table('customers')->insert([
                'name' => $faker->name, // Tên khách hàng
                'address' => $faker->address, // Địa chỉ ngẫu nhiên
                'phone' => $faker->phoneNumber, // Số điện thoại ngẫu nhiên
                'email' => $faker->unique()->safeEmail, // Email duy nhất
                'created_at' => now(), // Thời gian tạo
                'updated_at' => now(), // Thời gian cập nhật
            ]);
        }
        foreach (range(1, 10) as $index) {
            DB::table('orders')->insert([
                'customer_id' => $faker->numberBetween(1, 10), 
                'order_date' => $faker->date(),
                'status' => $faker->randomElement(['pending', 'completed', 'canceled']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach (range(1, 10) as $index) { // Giả sử thêm 20 bản ghi
            DB::table('order_details')->insert([
                'order_id' => $faker->numberBetween(1, 10), // Giả sử bạn có 10 đơn hàng trong bảng 'orders'
                'product_id' => $faker->numberBetween(1, 15), // Giả sử bạn có 15 sản phẩm trong bảng 'products'
                'quantity' => $faker->numberBetween(1, 100), // Số lượng ngẫu nhiên từ 1 đến 100
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}