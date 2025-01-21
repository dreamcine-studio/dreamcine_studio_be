<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'name' => 'Credit Card',
            'account_number' => '123456'

        ]);

        PaymentMethod::create([
            'name' => 'PayPal',
            'account_number' => '612532'
        ]);

        PaymentMethod::create([
            'name' => 'Bank Transfer',
            'account_number' => '172816'
        ]);
    }
}
