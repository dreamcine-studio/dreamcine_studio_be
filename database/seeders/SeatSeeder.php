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
            'seat_number' => ['A1', 'A2'],
            'isbooked' => true
        ]);
        Seat::create([
            'studio_id' => 2,
            'seat_number' => ['B1', 'B2', 'B3'],
            'isbooked' => true
        ]);
        Seat::create([
            'studio_id' => 3,
            'seat_number' => ['C15', 'C16'],
            'isbooked' => true
        ]);
    }
}
