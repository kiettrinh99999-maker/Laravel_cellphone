<?php

namespace App\Http\Controllers;

use App\Models\DB;
use Illuminate\Support\Facades\Hash;
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

        public function showForms()
        {
            $db = DB::getInstance();
            $categories = $db->getAll('Categories');
            return view('admin.forms', compact('categories'));
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


    public function login(Request $request)
    {
        // if (session()->has('user')) {
        //     return redirect('/admin1'); //trang dashboard
        // }

        $username = $request->input('username');
        $password = $request->input('password');

        $db = DB::getInstance();
        $user = $db->getOne('Users', [
            'where' => 'username = :username',
            'params' => ['username' => $username]
        ]);

        if (!$user) {
            return back()->withErrors(['username' => 'User is not exists'])->withInput();
        }

        if (hash('sha256', $password) !== $user['password']) {
            return back()->withErrors(['password' => 'Password is incorrect'])->withInput();
        }

        session(['user' => [
            'id' => $user['id_user'],
            'role' => $user['role']
        ]]);

        return redirect('/admin1');
    }
}
