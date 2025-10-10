<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function ajaxLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return response()->json([
                'status' => 'success',
                'message' => 'Đăng nhập thành công!',
                'redirect' => route('dashboard') // hoặc route khác
            ]);
        } else {
            // Sai tài khoản hoặc mật khẩu
            return response()->json([
                'status' => 'error',
                'message' => 'Email hoặc mật khẩu không đúng!'
            ]);
        }
    }
}