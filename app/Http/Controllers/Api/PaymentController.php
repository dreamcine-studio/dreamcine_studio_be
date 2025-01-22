<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{


    public function index(){
        $payments = Payment::all(); //elequent


        // mengecek data genre
        if ($payments->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found! nya"
            ], 200);
        }

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $payments
        ], 200);
    }




}
