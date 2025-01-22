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
            'name' => 'studio 1',
            'location' => 'lantai 2',
            'maxseats' => '25'

        ]);
        Studio::create([
            'name' => 'studio 2',
            'location' => 'lantai 3',
            'maxseats' => '25'

        ]);
        Studio::create([
            'name' => 'studio 3',
            'location' => 'lantai 4',
            'maxseats' => '25'

        ]);
    }
}
