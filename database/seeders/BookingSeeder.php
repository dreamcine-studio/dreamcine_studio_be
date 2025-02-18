<?php

namespace Database\Seeders;
use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user_id' => 1,
            'schedule_id' => 1,
            'seat_id' => 1,
            'quantity' => 1,
            'showtime' => '12:00',
            'amount' => 15000
        ]);
        Booking::create([
            'user_id' => 2,
            'schedule_id' => 2,
            'seat_id' => 2,
            'quantity' => 1,
            'showtime' => '15:00',
            'amount' => 41000
        ]);
        Booking::create([
            'user_id' => 2,
            'schedule_id' => 3,
            'seat_id' => 3,
            'quantity' => 3,
            'showtime' => '19:00',
            'amount' => 73000
        ]);
    }
}
