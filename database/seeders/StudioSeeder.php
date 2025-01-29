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
            'name' => 'Kelapa Gading XXI',
            'location' => 'lantai 2',
            'maxseats' => '25'

        ]);
        Studio::create([
            'name' => 'Depok Mall CGV',
            'location' => 'lantai 3',
            'maxseats' => '25'

        ]);
        Studio::create([
            'name' => 'Pondok Indah Mall XXI',
            'location' => 'lantai 4',
            'maxseats' => '25'

        ]);
    }
}
