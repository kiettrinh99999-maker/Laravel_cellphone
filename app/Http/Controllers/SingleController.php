<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function singleProduct()
    {
        return view('detail'); 
    }
}
