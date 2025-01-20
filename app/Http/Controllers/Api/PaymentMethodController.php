<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment_Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    public function index(){
        $payment_methods = Payment_Method::all(); //elequent

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
    public function store(Request $request){
        //1. validasi
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "account_number" => "required|string|max:255",
        ]);

        // 2. cek validator
        if($validator->fails()) {
            return response()->json([
                "succcess" => false,
                "message" => $validator->errors()
            ], 422);
        }

        //3. upload image



        //4. insert data
        $payment_method = Payment_Method::create([
            "name"=>$request->name,
            "account_number"=>$request->account_number,
        ]);

        // 5.return response
        return response()->json([ //ketika berhasil
            "success" => true,
            "message" => "Resource added succesfully",
            "data" => $payment_method
        ], 201);
    }

    public function show(string $id){
        $payment_method = Payment_Method::find($id);

        if(!$payment_method) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404);
        }

        return response()->json([ //ketika berhasil
            "success" => true,
            "message" => "Resource found",
            "data" => $payment_method
        ], 200);
    }

    public function update(Request $request, string $id){
        //cari data genre
        $payment_method = Payment_Method::find($id);

        if(!$payment_method) {
            return response()->json([
                "succcess" => false,
                "message" => "Resource not found!"
            ], 404);
        };

        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "account_number" => "required|string|max:255",
        ]);

        if($validator->fails()) {
            return response()->json([
                "succcess" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // siapkan data yang ingin diupdate
        $data = [
            "name"=>$request->name,
            "account_number"=>$request->account_number,
        ];

        //...upload image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image->store('payment_methods','public');

        }

        //update data baru
        $payment_method->update($data);

        return response()->json([
            "succcess" => true,
            "message" => "Resource updated successfully!",
            "data" => $payment_method
        ], 200);

    }

    public function destroy(string $id){
        $payment_method = Payment_Method::find($id);

        if(!$payment_method) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!",
            ], 404);
        };

        $payment_method->delete();

        return response()->json([
            "succcess" => true,
            "message" => "Resource deleted successfully",
        ], 200);
    }
}



