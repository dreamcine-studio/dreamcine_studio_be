<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShowtimeController extends Controller
{
    public function index()
    {
        $showtime = Showtime::all();
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $showtime
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "sequence" => "required|time",
        ]);

        // validasi error
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        };


        // insert data
        $showtime = Showtime::create([
            "sequence" => $request->sequence,
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added successfully!",
            "data" => $showtime
        ], 201);
    }

    public function show(string $id)
    {
        $showtime =Showtime::find($id);

        if (!$showtime) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found"
            ], 404); // validasi resource tidak ditemukan
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $showtime
        ], 200); // validasi create success
    }

    public function update(Request $request, string $id)
    {
        // cari data showtime
        $showtime = Showtime::find($id);

        // mengecek data showtime
        if (!$showtime) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!"
            ], 404);
        }



        // membuat validasi
        $validator = Validator::make($request->all(), [
            "sequence" => "required|time",
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // update data showtime
        $showtime->update([
            "sequence" => $request->sequence,
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully!",
            "data" => $showtime
        ], 200);
    }

    public function destroy(string $id)
    {
        // cari data sce$showtime
        $showtime = Showtime::find($id);

        // mengecek data sce$showtime
        if (!$showtime) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        // hapus data showtime
        $showtime->delete();

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully!",
        ], 200);
    }
}


