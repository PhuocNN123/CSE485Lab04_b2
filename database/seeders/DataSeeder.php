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
            DB::table('product')->insert([
                'name' => $faker->sentence(3), // Sinh tiêu đề sách với 3 từ
                'author' => $faker->name, // Tên tác giả
                'category' => $faker->word, // Một từ ngẫu nhiên làm thể loại
                'year' => $faker->year, // Năm xuất bản
                'quantity' => $faker->numberBetween(1, 100), // Số lượng từ 1 đến 100
            ]);
        }
    }
}
