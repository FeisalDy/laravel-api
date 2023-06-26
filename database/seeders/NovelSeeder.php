<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Novel;
use App\Models\Genre;

class NovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some genres
        $genres = Genre::factory()->count(5)->create();

        // Create novels and associate them with genres
        Novel::factory()->count(10)->create()->each(function ($novel) use ($genres) {
            $novel->genres()->attach($genres->random(2));
        });
    }
}
