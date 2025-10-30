<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DB;

class CategoryController extends Controller
{
    public function postCategoryApi(Request $request){
        $db=DB::getInstance();
        $name=$request->input('name');
        $options=["name"=>$name];
        $result=$db->insert('Categories',$options);
        return response()->json([
            'message' => 'Thêm thành công',
            'name' => $name,
            'id' => $result
        ], 200)->header('Content-Type', 'application/json');

    }
}
