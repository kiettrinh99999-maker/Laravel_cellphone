<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DB;

class DashbroadController extends Controller
{
    public function home()
    {

        
        $db = DB::getInstance();
        $products = $db->getAll('products'); // Lấy tất cả sản phẩm
        return view('home', compact('products'));
    }

}
