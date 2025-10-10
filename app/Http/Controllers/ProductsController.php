<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\Models\DB;

class ProductsController extends Controller
{
    
    public function home()
    {

        // return view('home'); //home
        $db = new DB('localhost', 'main_database', 'user_laravel', '');
        return 'Đã gọi constructor DB!';
    }

     public function shopPage()
    {
        return view('shop'); 
    } 
    public function singleProduct()
    {
        return view('detail'); 
    }
}
