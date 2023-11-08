<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Flower;
use App\Models\Region;
class RegionsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("regions")->delete();
        $flowerID = Flower::all()->pluck("id")->toArray();
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Region::create([
                'flower_id' => $faker->randomElement($flowerID),
                'region_name' => $faker->streetName,
            ]);
        }
    }
}


//Bảng regions: (id: Khóa chính, tự động tăng; flower_id: Khóa ngoại liên kết với
// bảng flowers; region_name: Tên khu vực phân bố; created_at: Thời gian tạo;
// updated_at: Thời gian cập nhật gần nhất)