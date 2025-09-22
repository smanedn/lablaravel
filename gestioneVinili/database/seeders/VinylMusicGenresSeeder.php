<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VinylMusicGenresSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vinyl_music_genres')->insert([
            // Collegamenti per "The Dark Side of the Moon"
            ['vinyl_id' => 1, 'genre_id' => 1], // Es. Rock
            ['vinyl_id' => 1, 'genre_id' => 2], // Es. Psichedelico

            // Collegamenti per "Abbey Road"
            ['vinyl_id' => 2, 'genre_id' => 1], // Es. Rock

            // Collegamenti per "Back in Black"
            ['vinyl_id' => 3, 'genre_id' => 3], // Es. Hard Rock
        ]);
    }
}
