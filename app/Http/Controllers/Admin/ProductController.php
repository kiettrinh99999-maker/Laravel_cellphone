<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateProduct;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getForm(){
        return view("admin.product");
    }
    public function postForm(ValidateProduct $request){
$product = $request->validated();
print_r($product); // Hoặc var_dump($product);

    }
    public function update(Request $request){
        
    }
}
