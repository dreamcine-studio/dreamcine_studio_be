<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ScheduleShowtime;

class ScheduleShowtimeSeeder extends Seeder
{
    public function run(): void
    {
            ScheduleShowtime::create([
                'schedule_id' => 1,
                'showtime_id' => 1
            ]);
            ScheduleShowtime::create([
                'schedule_id' => 2,
                'showtime_id' => 2
            ]);
            ScheduleShowtime::create([
                'schedule_id' => 3,
                'showtime_id' => 3
            ]);
        }
    }






