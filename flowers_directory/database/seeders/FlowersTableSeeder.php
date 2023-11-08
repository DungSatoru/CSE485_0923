<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Flower;
class FlowersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("flowers")->delete();
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Flower::create([
                'name' => $faker->name,
                'description' => $faker->text,
                'image_url' => $faker->imageUrl($width = 200, $height = 200),
            ]);
        }
    }
}
// (id: Khóa chính, tự động tăng; name: Tên loài hoa; description: Mô
// tả về loài hoa; image_url: Đường dẫn ảnh loài hoa; created_at: Thời gian tạo;
// updated_at: Thời gian cập nhật gần nhất)
