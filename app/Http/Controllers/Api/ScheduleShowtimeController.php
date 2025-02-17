<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScheduleShowtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleShowtimeController extends Controller
{
    public function index()
    {
        $scheduleShowtime = ScheduleShowtime::with('schedule','showtime')->get();
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $scheduleShowtime
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "schedule_id" => "required|integer|exists:schedules,id",
            "showtime_id" => "nullable|integer|exists:showtimes,id",
        ]);

        // validasi error
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        };


        // insert data
        $scheduleShowtime = ScheduleShowtime::create([
            "schedule_id" => $request->schedule_id,
            "showtime_id" => $request->showtime_id,
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added successfully!",
            "data" => $scheduleShowtime,
        ], 201);
    }

    public function show(string $id)
    {
        $scheduleShowtime = ScheduleShowtime::with('schedule','showtime')->find($id);

        if (!$scheduleShowtime) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404); // validasi resource tidak ditemukan
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $scheduleShowtime
        ], 200); // validasi create success
    }

    public function update(Request $request, string $id)
    {
        // cari data schedule
        $scheduleShowtime = ScheduleShowtime::find($id);

        // mengecek data schedule
        if (!$scheduleShowtime) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        // membuat validasi
        $validator = Validator::make($request->all(), [
            "schedule_id" => "required|integer|exists:schedules,id",
            "showtime_id" => "required|integer|exists:showtimes,id",
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // update data schedule
            $scheduleShowtime->update([
                "schedule_id" => $request->schedule_id,
                "showtime_id" => $request->showtime_id
            ]);

        // Return response setelah update berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully!",
            "data" => $scheduleShowtime,
        ], 200);
    }

    public function destroy(string $id)
    {
        // cari data sce$schedule
        $scheduleShowtime = ScheduleShowtime::find($id);

        // mengecek data sce$schedule
        if (!$scheduleShowtime) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        // hapus data schedule
        $scheduleShowtime->delete();

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully!",
        ], 200);
    }
}
