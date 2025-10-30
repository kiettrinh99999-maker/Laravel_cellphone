<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DB;

class LoginAdminController extends Controller
{
    public function showLogin(){
        return view('admin.login_admin');
    }

    public function postLogin(Request $request)
    {
        $username = $request->input('user');
        $password = hash('sha256', $request->input('password')); // Hash lại để so sánh

        $db = DB::getInstance();

        $options = [
            "where"  => "username = :param1 AND password = :param2",
            "params" => [
                ":param1" => $username,
                ":param2" => $password
            ]
        ];

        $get_ = $db->getOne('Users', $options);
        
        if ($get_) {
            if ($get_['role'] === 'admin') {
                session(['admin' => $get_]);
                return redirect()->route('home_admin');
            }
            // session(['admin' => true]);
            return redirect()->route('home');
        }

        return back()->with('error', 'Sai tài khoản hoặc mật khẩu');
    }
    public function logout(Request $request){
        $request->session()->forget('admin');
    }

}
