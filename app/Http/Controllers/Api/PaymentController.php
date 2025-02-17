<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\PaymentResource;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Order;

use App\Models\Payment;
use App\Models\Payment_method;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class PaymentController extends Controller
{
    public function index(){
        $payment_methods = Payment::with('booking','paymentMethod')->get();


        // mengecek data genre
        if ($payment_methods->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $payment_methods
        ], 200);
    }

    // store
    public function store(Request $request) {

        // 1. membuat validasi
        $validator = Validator::make($request->all(), [
            'booking_id' => 'nullable|exists:bookings,id',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'amount' => 'nullable|numeric|min:0',
        ]);

        // 2. melakukan cek data yang bermasalah
        if ($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

     // ambil data booking
     $booking = Booking::find($request->booking_id);
     $amount = $booking->amount;


    // Buat paymnet_code unik
     $payment_Code = "PC-". strtoupper(uniqid());


     // 3. membuat data payment
        $payment = Payment::create([
            'booking_id' => $request->booking_id,
            'payment_method_id' => $request->payment_method_id,
            'amount'=> $amount,
            "payment_code" => $payment_Code,
            "payment_date" => now(),
            'status'=> 'pending',


        ]);

        // // 4. memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added succesfully!",
            "data" => $payment
        ], 201);
    }

    public function show(string $id) {
        $payment = Payment::with('booking','paymentMethod')->find($id);

        if(!$payment){
            return response()->json([
                "status" => false,
                "message" => "Resorce not found",
            ], 404);
        };

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $payment
        ], 200);
    }


    // update

    public function update(Request $request, string $id) {
        // 1. cari data payment
        $payment = Payment::find($id);

        if (!$payment) {
          return response()->json([
            "success" => false,
            "message" => "Resource not found!"
          ], 404);
        }

        // 2. membuat validasi
        $validator = Validator::make($request->all(), [
            'status'=> 'required|string'
        ]);

        // 3. melakukan cek data yang bermasalah
        if ($validator->fails()){
          return response()->json([
            "success" => false,
            "message" => $validator->errors()
          ], 422);
        }


         //  // Ambil data user yang sedang login
         $user = auth('api')->user()->name;

            //cek login user
            if(!$user){
                return response()->json([
                    'status' => false,
                    'message' => "Unathorize"
                ], 401);
            }



        $payment->update([
            'status'=> $request->status,
            "staff_confirmed_by"=> auth('api')->user()->name,
            "staff_confirmed_at" => now()
        ]);

        return response()->json([
          "success" => true,
          "message" => "Resource updated successfully!",
          "data" => $payment
        ], 200);
    }


    // destroy
    public function destroy (string $id) {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json([
                "succes" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        $payment->delete();

        return response()->json([
            "success" => true,
            "messege" => "Resource deleted succesgully!",
        ],200);
    }

}
