<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
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



    //====================================================
    public function store(Request $request) {

        // 1. membuat validasi
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
            'payment_method_id' => 'required|exists:payment_methods,id',

        ]);

        // 2. melakukan cek data yang bermasalah
        if ($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }


        // ambil data order
        $order = Booking::find($request->order_id);

        // ambil data amount
        $amount = $order->total_amount;
        // dd($amount);

        // 3. membuat data payment
        $payment = Payment::create([
            'booking_id' => $request->order_id,
            'payment_method_id' => $request->payment_method_id,
            'amount'=> $amount,
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
        $payment = Payment::find($id);

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



    //====================================================
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

        // ambil data order
        // $order = Order::find($request->order_id);

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


    //====================================================
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
