<?php

namespace App\Http\Controllers;
use App\Models\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard(){
        return view('admin.dashboard');
    }

    public function showFlotChart(){
        return view('admin.flot');
    }

    public function showMorisChart(){
        return view('admin.moris');
    }

     public function showTable(){
        return view('admin.table');
    }
    public function showForms(){
        return view('admin.forms');
    }
    public function showPanelWell(){
        return view('admin.panels-wells');
    }
    public function showButton(){
        return view('admin.buttons');
    }
    public function showNotifi(){
        return view('admin.notifications');
    }

    public function showTypo(){
        return view('admin.typography');
    }
    public function showIcons(){
        return view('admin.icons');
    }
    public function showGrid(){
        return view('admin.grid');
    }
    public function showBlank(){
        return view('admin.blank');
    }
    public function showLogin(){
        return view('admin.login');
    }
    public function showTableProduct(){
        return view('admin.tableProduct');
    }

    public function showTableCategory(){
        return view('admin.tableCategory');
    }

    public function showTableUser(){
        return view('admin.tableUser');
    }

    public function login(Request $request){
        // Lấy dữ liệu từ request (Laravel sẽ tự validate hoặc bạn có thể thêm validate)
        $username = $request->input('username');
        $password = $request->input('password');
        // Khởi tạo DB (class bạn tự viết)
        $db = DB::getInstance();
        // Lấy user theo username
        $user = $db->getOne('Users', [
            'where' => 'username = :username',
            'params' => ['username' => $username]
        ]);
        if (!$user) {
            return back()->withErrors(['username' => 'User không tồn tại'])->withInput();
        }
        // Đăng nhập thành công, lưu user vào session bằng session helper
        session(['user' => [
            'id' => $user['id_user'],
            'role' => $user['role']
        ]]);
        // Redirect đến trang admin hoặc dashboard
        return redirect('/admin1');
    }
}
