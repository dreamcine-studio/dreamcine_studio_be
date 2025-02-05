<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function index()
    {
        // mengambil data movie
        $movies = Movie::all();

        // mengecek data movie
        if ($movies->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $movies
        ], 200);
    }

    public function store(Request $request)
    {
        // membuat validasi
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            "description" => "nullable|string|max:255",
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer',
            'cast' => 'required|string|max:255',
            'duration' => 'required|integer',
            'release_date' => 'required|date|date_format:Y-m-d|before:today',
            'genre_id' => 'required|integer'
        ]);

        // melakukan cek data yang bermasalah
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // upload poster
        if ($request->hasFile('poster')) {
            $image = $request->file('poster');
            $image->store('movies', 'public');
            $posterName = $image->hashName();
        }

        // membuat data movie
        $movie = Movie::create([
            "title" => $request->title,
            "description" => $request->description,
            "poster" => $posterName,
            "price" => $request->price,
            "cast" => $request->cast,
            "duration" => $request->duration,
            "release_date" => $request->release_date,
            "genre_id" => $request->genre_id
        ]);

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource added successfully!",
            "data" => $movie
        ], 201);
    }
    public function show(string $id)
    {
        // mengambil data movie
        $movie = Movie::find($id);

        // mengecek data movie
        if (!$movie) {
            return response()->json([
                "success" => false,
                "message" => "Resource movie not found!"
            ], 404);
        }

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Get detail movie resource",
            "data" => $movie
        ], 200);
    }

    public function update(Request $request, string $id)
    {

        // cari data movie
        $movie = Movie::find($id);

    // Mengecek apakah movie ditemukan
    if (!$movie) {
        return response()->json([
            "success" => false,
            "message" => "Resource not found!"
        ], 404);
    }

        // membuat validasi
        $validator = Validator::make($request->all(), [
            "title" => "nullable|string",
            "description" => "nullable|string|max:255",
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable|numeric',
            'cast' => 'nullable|string|max:255',
            'duration' => 'nullable|string',
            'release_date' => 'nullable|date|date_format:Y-m-d|before:today',
            'genre_id' => 'nullable|integer|exists:genres,id'
        ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        return response()->json([
            "success" => false,
            "message" => $validator->errors()
        ], 422);
    }

    // Data yang akan diperbarui
    $data = $request->only([
        'title',
        'description',
        'price',
        'cast',
        'duration',
        'release_date',
        'genre_id'
    ]);

    // Update poster jika ada file yang diunggah
    if ($request->hasFile('poster')) {
        // Hapus poster lama jika ada
        if ($movie->poster) {
            Storage::disk('public')->delete('movies/' . $movie->poster);
        }

        // Simpan poster baru
        $image = $request->file('poster');
        $imagePath = $image->store('movies', 'public');

        // Simpan hanya nama file ke dalam database
        $data['poster'] = basename($imagePath);
    }

    // Update data movie
    $movie->update($data);

    // Beri pesan sukses
    return response()->json([
        "success" => true,
        "message" => "Resource updated successfully!",
        "data" => $movie
    ], 200);
    }

    public function destroy(string $id)
    {

        // cari data movie
        $movie = Movie::find($id);

        // mengecek data movie
        if (!$movie) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found!",
            ], 404);
        }

        if ($movie->poster) {
            // delete image from storage
            Storage::disk('public')->delete('movies/' . $movie->poster);
        }

        // hapus data movie
        $movie->delete();

        // memberi pesan berhasil
        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully!",
        ], 200);
    }
}
