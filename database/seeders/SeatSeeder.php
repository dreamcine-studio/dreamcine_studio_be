<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seatsData = [
            [
                'schedule_showtime_id' => 1,
                'seat_number' => ['A1', 'A2'],
                'isbooked' => true,
            ],
            [
                'schedule_showtime_id' => 2,
                'seat_number' => ['B1', 'B2', 'B3'],
                'isbooked' => true,
            ],
            [
                'schedule_showtime_id' => 3,
                'seat_number' => ['C15', 'C16'],
                'isbooked' => true,
            ]
        ];

        // Loop untuk menyimpan setiap seat
        foreach ($seatsData as $seatData) {
            Seat::create($seatData);
        }
    }
}

