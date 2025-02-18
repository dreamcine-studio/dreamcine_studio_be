<?php

namespace Database\Seeders;

use App\Models\Movie;
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
        'poster' => 'annabelle.jpg',
        'price' => 50000,
        'cast' => 'Annabelle Wallis, Ward Horton, Alfre Woodard',
        'duration' => '99',
        'release_date' => '2014-10-03',
        'genre_id' => 3 
    ]);

    Movie::create([
        'title' => 'Inception',
        'description' => 'Seorang pencuri yang memiliki kemampuan untuk masuk ke dalam mimpi orang lain mendapatkan tugas untuk menanamkan ide di alam bawah sadar targetnya.',
        'poster' => 'inception.jpg',
        'price' => 75000,
        'cast' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page',
        'duration' => '148',
        'release_date' => '2010-07-16',
        'genre_id' => 6
    ]);

    Movie::create([
        'title' => 'The Pursuit of Happyness',
        'description' => 'Kisah inspiratif seorang ayah yang berjuang melawan kemiskinan demi masa depan anaknya.',
        'poster' => 'thepursuitofhappyness.png',
        'price' => 60000,
        'cast' => 'Will Smith, Jaden Smith, Thandie Newton',
        'duration' => '117',
        'release_date' => '2006-12-15',
        'genre_id' => 5
    ]);

    Movie::create([
        'title' => 'Perayaan Mati Rasa',
        'description' => 'Film drama yang menggambarkan perjalanan seorang pria dalam menghadapi trauma dan ketidakpekaan emosionalnya.',
        'poster' => 'perayaan-mati-rasa.jpg',
        'price' => 55000,
        'cast' => 'Umay Shahab, Iqbaal Ramadhan, Devano Danendra',
        'duration' => '120',
        'release_date' => '2023-11-10',
        'genre_id' => 5
    ]);

    Movie::create([
        'title' => 'Architecture of Love',
        'description' => 'Sebuah kisah romantis tentang dua arsitek yang menemukan cinta di tengah proyek pembangunan kota impian mereka.',
        'poster' => 'architecture-of-love.jpg',
        'price' => 70000,
        'cast' => 'Nicholas Saputra, Putri Marino',
        'duration' => '110',
        'release_date' => '2024-02-14',
        'genre_id' => 2
    ]);

    Movie::create([
        'title' => '1 Kakak 7 Ponakan',
        'description' => 'Komedi keluarga yang menceritakan seorang pria lajang yang harus mengurus tujuh ponakannya dengan berbagai keunikan karakter.',
        'poster' => '1-kakak-7-ponakkan.jpg',
        'price' => 45000,
        'cast' => 'Chicco Kurniawan, Amanda Rawles, Ringgo Agus Rahman',
        'duration' => '98',
        'release_date' => '2023-07-21',
        'genre_id' => 4
    ]);

    Movie::create([
        'title' => 'Interstellar',
        'description' => 'Perjalanan luar angkasa untuk mencari planet yang dapat dihuni di tengah krisis bumi.',
        'poster' => 'interstellar.jpg',
        'price' => 85000,
        'cast' => 'Matthew McConaughey, Anne Hathaway, Jessica Chastain',
        'duration' => '169',
        'release_date' => '2014-11-07',
        'genre_id' => 6
    ]);

    Movie::create([
        'title' => 'Parasite',
        'description' => 'Sebuah keluarga miskin menyusup ke dalam rumah keluarga kaya dengan cara yang licik.',
        'poster' => 'parasite.jpg',
        'price' => 65000,
        'cast' => 'Song Kang-ho, Lee Sun-kyun, Cho Yeo-jeong',
        'duration' => '132',
        'release_date' => '2019-05-30',
        'genre_id' => 5
    ]);

    Movie::create([
        'title' => 'Spirited Away',
        'description' => 'Seorang gadis muda terjebak di dunia roh dan harus menemukan cara untuk menyelamatkan orang tuanya.',
        'poster' => 'spirited-away.jpg',
        'price' => 50000,
        'cast' => 'Rumi Hiiragi, Miyu Irino, Mari Natsuki',
        'duration' => '125',
        'release_date' => '2001-07-20',
        'genre_id' => 6
    ]);
}

}
