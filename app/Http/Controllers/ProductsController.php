<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;   
use App\Models\Product;            

class ProductsController extends Controller
{
    
    public function home()
    {
        $products = DB::table('Products')->limit(10)->get();
        return view('home', compact('products'));

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
