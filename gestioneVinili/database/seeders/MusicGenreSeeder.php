<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicGenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('music_genre')->insert([
            [
                'id' => 1,
                'name' => 'Rock'
            ],
            [
                'id' => 2,
                'name' => 'Psychedelic'
            ],
            [
                'id' => 3,
                'name' => 'Hard Rock'
            ],
        ]);
    }
}
