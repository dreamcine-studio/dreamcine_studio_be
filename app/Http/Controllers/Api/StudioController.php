<?php

namespace App\Http\Controllers\Api;
use App\Models\Studio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudioController extends Controller
{
    public function index()
    {
        // mengambil data studio
        $studios = Studio::all();

        // mengecek data studio
        if ($studios->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $studios
        ], 200);
    }

    public function store(Request $request)
    {
        // membuat validasi
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "location" => "required|string",
            "maxseats" => "required|integer"
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // membuat data studio
        $studio = Studio::create([
            "name" => $request->name,
            "location" => $request->location,
            "maxseats" => $request->maxseats
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added successfully!",
            "data" => $studio
        ], 201);
    }

    public function show(string $id)
    {
        // mengambil data studio
        $studio = Studio::find($id);

        // mengecek data studio
        if (!$studio) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $studio
        ], 200);
    }

    public function update(Request $request, string $id)
    {

        // cari data studio
        $studio = Studio::find($id);

        // mengecek data studio
        if (!$studio) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!"
            ], 404);
        }

        // membuat validasi
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "location" => "required|string",
            "maxseats" => "required|integer"
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // update data studio
        $studio->update([
            "name" => $request->name,
            "location" => $request->location,
            "maxseats" => $request->maxseats
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully!",
            "data" => $studio
        ], 200);
    }

    public function destroy(string $id)
    {

        // cari data studio
        $studio = Studio::find($id);

        // mengecek data studio
        if (!$studio) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!",
            ], 404);
        }

        // hapus data studio
        $studio->delete();

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully!",
        ], 200);
}
}
