<?php

namespace App\Http\Controllers\Api;


use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        // mengambil data booking
        $booking = Booking::with('user','scheduleShowtime','seat')->get();

        // mengecek data booking
        if ($booking->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $booking
        ], 200);
    }

    public function store(Request $request)
    {
        // membuat validasi
        $validator = Validator::make($request->all(), [
            "user_id" => "required|integer|exists:users,id",
            "schedule_showtime_id" => "required|integer|exists:schedule_showtimes,id",
            "seat_id" => "nullable|integer|exists:seats,id",
            "quantity" => "required|integer",
            'amount' => 'nullable|numeric|min:0',
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // membuat data booking
        $booking = Booking::create([
            "user_id" => $request->user_id,
            "schedule_showtime_id" => $request->schedule_showtime_id,
            "seat_id" => $request->seat_id,
            "quantity" => $request->quantity,
            "showtime" => $request->showtime,
            "amount" => $request->amount
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added successfully!",
            "data" => $booking
        ], 201);
    }

    public function show(string $id)
    {
        // mengambil data booking
        $booking = Booking::with('user','scheduleShowtime','seat')->find($id);

        // mengecek data booking
        if (!$booking) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $booking
        ], 200);
    }

    public function update(Request $request, string $id)
    {

        // cari data booking
        $booking = Booking::find($id);

        // mengecek data booking
        if (!$booking) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        // membuat validasi
        $validator = Validator::make($request->all(), [
            "user_id" => "required|integer|exists:users,id",
            "schedule_showtime_id" => "required|integer|exists:schedule_showtimes,id",
            "seat_id" => "required|integer|exists:seats,id",
            "quantity" => "required|integer",
            'amount' => 'nullable|numeric|min:0',
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // update data booking
        $booking->update([
            "user_id" => $request->user_id,
            "schedule_showtime_id" => $request->schedule_showtime_id,
            "seat_id" => $request->seat_id,
            "quantity" => $request->quantity,
            "amount" => $request->amount
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully!",
            "data" => $booking
        ], 200);
    }

    public function destroy(string $id)
    {

        // cari data booking
        $booking = Booking::find($id);

        // mengecek data booking
        if (!$booking) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!",
            ], 404);
        }

        // hapus data booking
        $booking->delete();

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully!",
        ], 200);
}
}
