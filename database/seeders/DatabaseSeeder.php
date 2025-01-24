<?php

namespace Database\Seeders;

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
            BookingSeeder::class,
            SeatSeeder::class,
            PaymentSeeder::class,
            UserSeeder::class
        ]);
    }
}
