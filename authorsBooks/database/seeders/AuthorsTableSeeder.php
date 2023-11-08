<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class AuthorsTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table("authors")->delete();
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Author::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'birthdate' => $faker->dateTimeBetween('-60 years', '-18 years'),
                'gender' => $faker->boolean,
            ]);
        }
    }
}
