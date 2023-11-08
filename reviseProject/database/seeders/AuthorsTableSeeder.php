<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->delete();
        $faker = Faker::create();
        /*  Một thằng tác giả: Giới hạn từ 18 tuổi đến 60 tuổi. */
        for ($i = 0; $i < 25; $i++) {
            Author::create([
                'name' => $faker->name,
                'email' => $faker->safeEmail(),
                'birthdate' => $faker->dateTimeBetween('-60 years', '-18 years'),
                'gender' => $faker->boolean(),
            ]);
        }
    }
}
