<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->delete();
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            Book::create([
                'Title' => $faker->words(2, true),
                'Author' => $faker->name,
                'Genre' => $faker->randomElement(['Detective', 'Romance', 'Comedy', 'Science']),
                'PublicationYear' => $faker->dateTimeBetween('-20 years', '-1 years'),
                'ISBN' => $faker->ean13(),
                'CoverImageUrl' => $faker->imageUrl(200, 200, 'Books', true),
            ]);
        }
    }
}
