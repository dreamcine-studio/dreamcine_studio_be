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
            'maxseats' => '165'

        ]);
        Studio::create([
            'name' => 'Depok Mall CGV',
            'maxseats' => '165'

        ]);
        Studio::create([
            'name' => 'Pondok Indah Mall XXI',
            'maxseats' => '165'

        ]);
    }
}
