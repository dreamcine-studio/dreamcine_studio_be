<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'Annabelle',
            'description' => 'Sebuah boneka vintage yang dirasuki oleh roh jahat membawa teror ke dalam kehidupan pasangan muda.',
            'poster' => 'https://example.com/annabelle-poster.jpg',
            'price' => 50000,
            'cast' => 'Annabelle Wallis, Ward Horton, Alfre Woodard',
            'duration' => '99',
            'release_date' => '2014-10-03',
            'genre_id' => '3'
        ]);
        Movie::create([
                'title' => 'Inception',
                'description' => 'Seorang pencuri yang memiliki kemampuan untuk masuk ke dalam mimpi orang lain mendapatkan tugas untuk menanamkan ide di alam bawah sadar targetnya.',
                'poster' => 'https://example.com/inception-poster.jpg',
                'price' => 75000,
                'cast' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page',
                'duration' => '148',
                'release_date' => '2010-07-16',
                'genre_id' => '1'
            ]);
        Movie::create([
            'title' => 'The Pursuit of Happyness',
            'description' => 'Kisah inspiratif seorang ayah yang berjuang melawan kemiskinan demi masa depan anaknya.',
            'poster' => 'https://example.com/pursuit-of-happyness-poster.jpg',
            'price' => 60000,
            'cast' => 'Will Smith, Jaden Smith, Thandie Newton',
            'duration' => '117',
            'release_date' => '2006-12-15',
            'genre_id' => '2'
        ]);
    }
}
