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
        // Membuat validasi
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => [
                "required",
                "string",
                "min:8",
                function ($attribute, $value, $fail) {
                    if (strlen($value) < 8) {
                        $fail("Password must be at least 8 characters.");
                    }
                }
            ]
        ], [
            "name.required" => "Name is required.",
            "email.required" => "Email is required.",
            "email.email" => "Please enter a valid email.",
            "email.unique" => "Email already exists. Please login instead.",
            "password.required" => "Password is required.",
            "password.min" => "Password must be at least 8 characters."
        ]);

        // Cek validasi
        if ($validator->fails()) {
            // Jika email sudah terdaftar, beri pesan khusus
            if ($validator->errors()->has('email')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email already exists. Please login instead.',
                    'errors' => $validator->errors()
                ], 409); // Conflict
            }

            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Tambah data user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'User creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    //Login

    public function login(Request $request) {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide email and password'
            ], 422);
        }

        // Cek apakah email terdaftar di database
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Username not found, please register'
            ], 404);
        }

        // Cek apakah password cocok
        if (!$token = auth()->guard('api')->attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Email or Password Incorrect!'
            ], 401);
        }

        // Jika berhasil login
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
