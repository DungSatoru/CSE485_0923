<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Khởi tạo đối tượng Faker
        $faker = Faker::create();
        // Chạy vòng lặp xác định số bản ghi và kiểu dữ liệu muốn sinh
        for ($i = 0; $i < 50; $i++) {
            Post::create([
                'title' => $faker->sentence(6, true),
                'body'=> $faker->paragraphs(3, true)
            ]);
        }
    }
}
