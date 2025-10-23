<?php

namespace App\Http\Controllers\Admin;
namespace App\Models\Category;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getForm($page_number=1)
    {   
        
        return view("admin.product");
    }
    public function postForm(Request $request){
        
    }
    public function update(Request $request){
        
    }
    public function show(Request $request){

    }
}
