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
        'showdate_start' => '2024-12-09',
        'showdate_end' => '2025-06-01'
      ]);

      Schedule::create([
        'movie_id' => 2,
        'studio_id' => 2,
        'showdate_start' => '2024-07-10',
        'showdate_end' => '2025-08-10'
      ]);

      Schedule::create([
        'movie_id' => 3,
        'studio_id' => 3,
        'showdate_start' => '2024-11-11',
        'showdate_end' => '2025-12-11',
      ]);
    }
}
