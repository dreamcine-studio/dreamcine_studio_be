<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeatController extends Controller
{
    public function index() {
        $seats = Seat::with('scheduleSHowtime')->get();
        return response()->json([
          "success" => true,
          "message" => "Get All Resource",
          "data" => $seats
          ], 200);
      }

    public function store(Request $request) {

        $validator = Validator::make($request->all(),[
            "schedule_showtime_id" => "required|exists:schedule_showtimes,id",
            "seat_number" => "required|array|min:1",
            "showdate" => "required|date",
            "isbooked" => "required|boolean",
          ]);

          // validasi error
        if($validator->fails()){
          return response()->json([
            "success" => false,
            "message" => $validator->errors()
        ], 422);
    };

          // insert data
        $seat = Seat::create([
          "schedule_showtime_id" => $request->schedule_showtime_id,
          "seat_number" => $request->seat_number,
          "showdate" => $request->showdate,
          "isbooked" => $request->isbooked,
          ]);

            // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added successfully!",
            "data" => $seat
         ], 201);

      }

      public function show(string $id){
          $seat = Seat::with('scheduleSHowtime')->find($id);

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
            "schedule_showtime_id" => "required|exists:schedule_showtimes,id",
            "seat_number" => "required|array|min:1",
            "showdate" => "required|date",
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
          "schedule_showtime_id" => $request->schedule_showtime_id,
          "seat_number" => $request->seat_number,
          "showdate" => $request->showdate,
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
