<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VinylSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vinyl')->insert([
            [
                'title' => 'The Dark Side of the Moon',
                'release_year' => 1973,
                'cover_image' => 'dark_side_moon.jpg',
                'artist_id' => 1, // Assicurati che esista un artista con ID 1
            ],
            [
                'title' => 'Abbey Road',
                'release_year' => 1969,
                'cover_image' => 'abbey_road.jpg',
                'artist_id' => 2, // Assicurati che esista un artista con ID 2
            ],
            [
                'title' => 'Back in Black',
                'release_year' => 1980,
                'cover_image' => 'back_in_black.jpg',
                'artist_id' => 3, // Assicurati che esista un artista con ID 3
            ],
        ]);
    }
}
