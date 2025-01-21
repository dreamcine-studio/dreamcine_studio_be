<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seat::create([
            'studio_id' => 1,
            'seat_number' => 1,
            'isbooked' => true
        ]);
        Seat::create([
            'studio_id' => 2,
            'seat_number' => 11,
            'isbooked' => true
        ]);
        Seat::create([
            'studio_id' => 3,
            'seat_number' => 25,
            'isbooked' => true
        ]);
    }
}
