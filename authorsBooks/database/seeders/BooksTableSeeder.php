<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
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
        $authors_id = Author::get()->pluck('id')->toArray();
        /* select id from Authors */
        /*  Một thằng tác giả: Giới hạn từ 18 tuổi đến 60 tuổi. */
        for ($i = 0; $i < 100; $i++) {
            Book::create([
                'name' => $faker->words(5, true),
                'image' => $faker->imageUrl(200, 200, 'Books', true),
                'published_date' => $faker->dateTimeBetween('-10 years', 'now'),
                'categories' => $faker->randomElement(['Tâm lý', 'Ngôn tình', 'Tiểu thuyết', 'Giáo dục']),
                'author_id' => $faker->randomElement($authors_id),
            ]);
        }
    }
}
