<?php

namespace Database\Seeders;

use App\Models\Studio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Studio::create([
            'name' => 'Theater 1',
            'maxseats' => '165'

        ]);
        Studio::create([
            'name' => 'Theater 2',
            'maxseats' => '165'

        ]);
        Studio::create([
            'name' => 'Theater 3',
            'maxseats' => '165'

        ]);
    }
}
