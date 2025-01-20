<?php

namespace Database\Seeders;

use App\Models\Payment_Method;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment_Method::create([
            'name' => 'Credit Card',
            'account_number' => '123456'

        ]);

        Payment_Method::create([
            'name' => 'PayPal',
            'account_number' => '612532'
        ]);

        Payment_Method::create([
            'name' => 'Bank Transfer',
            'account_number' => '172816'
        ]);
    }
}
