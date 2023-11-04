<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Major;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("majors")->delete();
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Major::create([
                'name' => $faker->jobTitle,
                'description' => $faker->text,
                'duration' => $faker->randomNumber(2, 5),
            ]);
        }
    }
}
