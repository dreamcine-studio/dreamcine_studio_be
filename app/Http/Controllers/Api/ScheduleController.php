<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function index() {
        $schedule = Schedule::all();
        return response()->json([
          "success" => true,
          "message" => "Get All Resource",
          "data" => $schedule
          ], 200);
      }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            "movie_id" => "required|integer|exists:movies,id",
            "studio_id" => "required|integer|exists:studios,id",
            "showtime" => "required|date",
            "showdate_start" => "required|date",
            "showdate_end" => "required|date"
          ]);

          // validasi error
        if($validator->fails()){
          return response()->json([
            "success" => false,
            "message" => $validator->errors()
        ], 422);
          };

          // insert data
        $schedule = Schedule::create([
        "movie_id" => $request->movie_id,
        "studio_id" => $request->studio_id,
        "showtime" => $request ->showtime,
        "showdate_start" => $request->showdate_start,
        "showdate_end" => $request->showdate_end
          ]);

            // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added successfully!",
            "data" => $schedule
         ], 201);

      }

      public function show(string $id){
          $schedule = Schedule::find($id);

          if (!$schedule) {
              return response()->json([
                  "success" => false,
                  "message" => "Resource not found"
              ], 404); // validasi resource tidak ditemukan
          }

          return response()->json([
              "success" => true,
              "message" => "Get detail resource",
              "data" => $schedule
          ], 200); // validasi create success
      }

      public function update(Request $request, string $id) {
           // cari data schedule
          $schedule = Schedule::find($id);

          // mengecek data schedule
          if (!$schedule) {
              return response()->json([
              "success" => false,
              "message" => "Resource not found!"
              ], 404);
          }

            // membuat validasi
          $validator = Validator::make($request->all(), [
            "movie_id" => "required|integer|exists:movies,id",
            "studio_id" => "required|integer|exists:studios,id",
            "showtime" => "required|date",
            "showdate_start" => "required|date",
            "showdate_end" => "required|date"
          ]);

           // melakukan cek data yang bermasalah
          if ($validator->fails()) {
              return response()->json([
              "success" => false,
              "message" => $validator->errors()
              ], 422);
          }

          // update data schedule
        $schedule->update([
          "movie_id" => $request->movie_id,
        "studio_id" => $request->studio_id,
        "showtime" => $request ->showtime,
        "showdate_start" => $request->showdate_start,
        "showdate_end" => $request->showdate_end
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully!",
            "data" => $schedule
        ], 200);
        }

      public function destroy(string $id){
            // cari data sce$schedule
            $schedule = Schedule::find($id);

            // mengecek data sce$schedule
          if (!$schedule) {
              return response()->json([
              "success" => false,
              "message" => "Resource not found!"
              ], 404);
          }

            // hapus data schedule
            $schedule->delete();

            // memberi pesan berhasil
            return response()->json([
                "success" => true,
                "message" => "Resource deleted successfully!",
            ], 200);
    }
}
