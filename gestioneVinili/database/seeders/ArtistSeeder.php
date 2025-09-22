<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('artist')->insert([
            [
                'id' => 1,
                'first_name' => 'Pink',
                'last_name' => 'Floyd',
                'photo_image' => 'pink_floyd.jpg'
            ],
            [
                'id' => 2,
                'first_name' => 'The',
                'last_name' => 'Beatles',
                'photo_image' => 'beatles.jpg'
            ],
            [
                'id' => 3,
                'first_name' => 'AC',
                'last_name' => 'DC',
                'photo_image' => 'acdc.jpg'
            ],
        ]);
    }
}
