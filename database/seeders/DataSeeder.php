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
        foreach(range(1,10) as $index){
            DB::table('products')->insert([
                'name' => $faker->sentence(3), // Sinh tiêu đề sách với 3 từ
                'description' => $faker->word, // Sinh tiêu đề sách với 3 từ
                'price' => $faker->randomFloat(2, 1000, 1000000), // Tên tác giả
                'quantity' => $faker->numberBetween(1, 100), // Số lượng từ 1 đến 100
            ]);
        }
    }
}
