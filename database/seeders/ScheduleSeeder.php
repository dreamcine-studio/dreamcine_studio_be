<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Schedule::create([
        'movie_id' => 1,
        'studio_id' => 1,
        'showtime'=> '2024-12-09'
      ]);

      Schedule::create([
        'movie_id' => 2,
        'studio_id' => 2,
        'showtime'=> '2024-12-09'
      ]);

      Schedule::create([
        'movie_id' => 3,
        'studio_id' => 3,
        'showtime'=> '2024-12-09'
      ]);
    }
}
