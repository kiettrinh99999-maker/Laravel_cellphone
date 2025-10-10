<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashbroadController extends Controller
{
    public function home()
    {
        return view('home'); //home
        // $db = new DB('localhost', 'laravel', 'root', '');
        // return 'Đã gọi constructor DB!';
    }
}
