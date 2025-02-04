<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeatController extends Controller
{
    public function index() {
        $seats = Seat::all();
        return response()->json([
          "success" => true,
          "message" => "Get All Resource",
          "data" => $seats
          ], 200);
      }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            "studio_id" => "required|exists:studios,id",
            "seat_number" => "required|array",
          ]);

          // validasi error
        if($validator->fails()){
          return response()->json([
            "success" => false,
            "message" => $validator->errors()
        ], 422);
    };

    if (Seat::isSeatBooked($request->studio_id, $request->seat_number)) {
        return response()->json([
            "success" => false,
            "message" => "Seat number already booked!"
        ], 400); // HTTP status 400: Bad Request
    }

          // insert data
        $seat = Seat::create([
          "studio_id" => $request->studio_id,
          "seat_number" => $request->seat_number,
          "isbooked" => true
          ]);

            // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added successfully!",
            "data" => $seat
         ], 201);

      }

      public function show(string $id){
          $seat = Seat::find($id);

          if (!$seat) {
              return response()->json([
                  "success" => false,
                  "message" => "Resource not found"
              ], 404); // validasi resource tidak ditemukan
          }

          return response()->json([
              "success" => true,
              "message" => "Get detail resource",
              "data" => $seat
          ], 200); // validasi create success
      }

      public function update(Request $request, string $id) {
           // cari data seat
          $seat = Seat::find($id);

          // mengecek data seat
          if (!$seat) {
              return response()->json([
              "success" => false,
              "message" => "Resource not found!"
              ], 404);
          }

            // membuat validasi
          $validator = Validator::make($request->all(), [
            "studio_id" => "required|exists:studios,id",
            "seat_number" => "required|array",
            "isbooked" => "required|boolean"
          ]);

           // melakukan cek data yang bermasalah
          if ($validator->fails()) {
              return response()->json([
              "success" => false,
              "message" => $validator->errors()
              ], 422);
          }

          // update data seat
        $seat->update([
          "studio_id" => $request->studio_id,
          "seat_number" => $request->seat_number,
          "isbooked" => $request->isbooked
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully!",
            "data" => $seat
        ], 200);
        }

      public function destroy(string $id){
            // cari data seat
            $seat = Seat::find($id);

            // mengecek data seat
          if (!$seat) {
              return response()->json([
              "success" => false,
              "message" => "Resource not found!"
              ], 404);
          }

            // hapus data seat
            $seat->delete();

            // memberi pesan berhasil
            return response()->json([
                "success" => true,
                "message" => "Resource deleted successfully!",
            ], 200);

      }
}
