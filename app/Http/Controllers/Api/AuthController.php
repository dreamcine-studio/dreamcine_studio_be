<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request) {
        // membuat validasi
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8"
        ]); 

        // cek validasi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // tambah data user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // memberi pesan berhasil
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ], 201);

            // Return response if process failed
            return response()->json([
                'success' => false,
                'message' => 'User creation failed'
            ], 409); // Conflict
        }
    }


    //Login

    public function login(Request $request) {
        // membuat validasi
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // cek validsai
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // mengambil data email dan password
        $credentials = $request->only('email', 'password');

        // jika data tersebut gagal
        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah!'
            ], 401);
        }

        // membuat pesan apabila sukses
        return response()->json([
            'success' => true,
            'message' => 'Login successfully',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);

    }


    // Logout

    public function logout(Request $request) {
        try {
            // agar token yang sudah ada di hapus semuah
            JWTAuth::invalidate(JWTAuth::getToken());

            // jika logout berhasil
            return response()->json([
                'success' => true,
                'massege' => 'Logout succesfully!'
            ], 200);

        // jika logout gagal
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'massege' => 'Logout failed!'
            ], 500);
        }
    }
}
