<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->delete();
        $faker = Faker::create();
        $book_ids = Book::all()->pluck('BookID')->toArray();
        $user_ids = User::all()->pluck('id')->toArray();
        for ($i = 0; $i < 200; $i++) {
            Review::create([
                'BookID' => $faker->randomElement($book_ids),
                'UserID' => $faker->randomElement($user_ids),
                'Rating' => $faker->randomElement([1, 2, 3, 4, 5]),
                'ReviewText' => $faker->sentences(2, true),
                'ReviewDate' => $faker->dateTimeBetween('-1 years', 'now'),
            ]);
        }
    }
}
