<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    public function home()
    {
        return view('home'); //home
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
