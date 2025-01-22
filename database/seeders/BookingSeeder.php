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
            'quantity' => 1,
            'booking_date' => '2024-12-09'
        ]);
        Booking::create([
            'user_id' => 2,
            'schedule_id' => 2,
            'quantity' => 1,
            'booking_date' => '2024-12-10'
        ]);
        Booking::create([
            'user_id' => 3,
            'schedule_id' => 3,
            'quantity' => 3,
            'booking_date' => '2024-12-11'
        ]);
    }
}
