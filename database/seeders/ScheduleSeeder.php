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
        'showtime'=> '12:30',
        'showdate_start' => '2024-12-09',
        'showdate_end' => '2024-12-09'
      ]);

      Schedule::create([
        'movie_id' => 2,
        'studio_id' => 2,
        'showtime'=> '14:00',
        'showdate_start' => '2024-12-10',
        'showdate_end' => '2024-12-10'
      ]);

      Schedule::create([
        'movie_id' => 3,
        'studio_id' => 3,
        'showtime'=> '16:00',
        'showdate_start' => '2024-12-11',
        'showdate_end' => '2024-12-11',
      ]);

      Schedule::create([
        'movie_id' => 2,
        'studio_id' => 2,
        'showtime'=> '15:30',
        'showdate_start' => '2024-12-13',
        'showdate_end' => '2024-12-13',
      ]);

      Schedule::create([
        'movie_id' => 1,
        'studio_id' => 1,
        'showtime'=> '13:20',
        'showdate_start' => '2024-12-09',
        'showdate_end' => '2024-12-09',
      ]);

      Schedule::create([
        'movie_id' => 1,
        'studio_id' => 1,
        'showtime'=> '15:45',
        'showdate_start' => '2024-12-13',
        'showdate_end' => '2024-12-13',
      ]);

      Schedule::create([
        'movie_id' => 2,
        'studio_id' => 2,
        'showtime'=> '17:00',
        'showdate_start' => '2024-12-13',
        'showdate_end' => '2024-12-13',
      ]);
      Schedule::create([
        'movie_id' => 3,
        'studio_id' => 3,
        'showtime'=> '17:30',
        'showdate_start' => '2024-12-11',
        'showdate_end' => '2024-12-11',
      ]);
    }
}
