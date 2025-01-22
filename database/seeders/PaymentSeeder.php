<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //bawaan create itu eloquent
        Payment::create([
                "payment_code" => "01234",
                "booking_id" => 1,
                "payment_method_id" => 1,
                "amount" => 30,
                "payment_date" => "2024-01-19",
                "status" => "pending"
        ]);

        Payment::create([
            "payment_code" => "0AB12",
            "booking_id" => 2,
            "payment_method_id" => 2,
            "amount" => 14,
            "payment_date" => "2024-01-19",
            "status" => "pending"
    ]);

         Payment::create([
            "payment_code" => "01234",
            "booking_id" => 3,
            "payment_method_id" => 3,
            "amount" => 15,
            "payment_date" => "2024-01-19",
            "status" => "pending"
]);
    }
}
