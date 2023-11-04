<?php

namespace Database\Seeders;

use App\Models\Woman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WomenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("women")->delete();
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Woman::create([
                'name' => $faker->name,
                'biography' => $faker->text,
                'field_of_work' => $faker->jobTitle,
                'image' => $faker->imageUrl($width = 200, $height = 200),
                'birth_date' => $faker->date,
            ]);
        }
    }
}
