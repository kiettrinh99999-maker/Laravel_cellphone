<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DB;

class DashbroadController extends Controller
{
    public function home()
    {
        $db = DB::getInstance(); 
        $sql = "SELECT Image FROM products WHERE id IN (11, 12)";
        $products = $db->getAll($sql);
        return view('home',compact('products')); //home
        // $db = new DB('localhost', 'laravel', 'root', '');
        // return 'Đã gọi constructor DB!';
    }
}
