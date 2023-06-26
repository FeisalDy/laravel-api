<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $genres = [
            [
                'name' => 'Action',
                'description' => 'Action-packed movies and TV shows.',
            ],
            [
                'name' => 'Comedy',
                'description' => 'Funny and light-hearted entertainment.',
            ],
            [
                'name' => 'Drama',
                'description' => 'Emotional and intense storytelling.',
            ],
        ];

        Genre::insert($genres);
    }
}
