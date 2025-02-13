<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
            PaymentMethodSeeder::class,
            StudioSeeder::class,
            MovieSeeder::class,
            ScheduleSeeder::class,
            ShowtimeSeeder::class,
            ScheduleShowtimeSeeder::class,
            BookingSeeder::class,
            SeatSeeder::class,
            PaymentSeeder::class,
            UserSeeder::class,
        ]);
    }
}
