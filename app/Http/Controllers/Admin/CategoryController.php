<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getForm(){
        return view("admin.product");
    }
    public function postForm(Request $request){
        
    }
    public function update(Request $request){
        
    }
}
