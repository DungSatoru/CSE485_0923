<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artwork;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArtworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("artworks")->delete();
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Artwork::create([
                'artist_name'=> $faker->name,
                'description'=> $faker->sentence,
                'art_type' => $faker->randomElement(['painting', 'music', 'literature']),
                'media_link' => $faker->url,
                'cover_image' => $faker->imageUrl(),
            ]);
        }
    }
}
