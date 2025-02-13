<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Showtime::create([
            'sequence' => "12:00"
        ]);
        Showtime::create([
            'sequence' => "14:00"
        ]);
        Showtime::create([
            'sequence' => "16:00"
        ]);
    }
}
