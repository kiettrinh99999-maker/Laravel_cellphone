<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DB;

class DashbroadController extends Controller
{
    public function home()
    {
<<<<<<< Updated upstream
        $db = DB::getInstance(); 
        $sql = "SELECT Image FROM products WHERE id IN (11, 12)";
        $products = $db->getAll($sql);
        return view('home',compact('products')); //home
||||||| Stash base
        return view('home'); //home
=======
        $db = DB::getInstance(); 
        $sql = "SELECT Image FROM products WHERE id IN ( 112,111)";
        $products = $db->getAll($sql);
        return view('home',compact('products')); //home
>>>>>>> Stashed changes
        // $db = new DB('localhost', 'laravel', 'root', '');
        // return 'Đã gọi constructor DB!';
    }
}
