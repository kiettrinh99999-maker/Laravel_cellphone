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
        $validated = $request->validate([
            
        ]);
       
        // $imagePath = null;
        // if ($request->hasFile('image1')) {
        //     $imagePath = $request->file('image1')->store('products', 'public');
        // }
        
        return redirect()->back()->with('success', 'Add success');
    }
    public function update(Request $request){
        
    }
}
