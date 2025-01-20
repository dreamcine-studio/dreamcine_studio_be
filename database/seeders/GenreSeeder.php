<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'description' => 'Movies that feature intense physical activity, including fights, chases, and explosions.',
        ]);
        Genre::create([
            'name' => 'Romance',
            'description' => 'Movies that explore love stories and emotional relationships between characters.',
        ]);
        Genre::create([
            'name' => 'Horror',
            'description' => 'Movies designed to scare and thrill audiences with suspenseful and frightening elements.',
        ]);
    }
}
