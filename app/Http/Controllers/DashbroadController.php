<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DB;

class DashbroadController extends Controller
{
    public function home()
    {
    static $db=DB::getInstance();
        $products_Sale = $db->getAll('Products', [
        'where' => "tags like :tag1 AND status = :status",
        'params' => [
            ':status' => 'available',
            ':tag1'=>'%sale%'
        ],
        'limit'=>3
    ]);
    // Products mới tạo trong 7 ngày
    $products_Lastest = $db->getAll('Products', [
        'where' => "status = :status AND DATEDIFF(NOW(), date_create) <= :days",
        'params' => [
            ':status' => 'available',
            ':days' => 7
        ],
        'limit'=>10
    ]);

    // Products có tag 'best'
    $products_BestSale = $db->getAll('Products', [
        'where' => "sale >=15 AND status = :status",
        'params' => [
            ':status' => 'available',
        ],
        'limit'=>3
    ]);

        return view('home', compact('products_Lastest','products_BestSale','products_Sale'));
    }

}
