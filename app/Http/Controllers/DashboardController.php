<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DB;

class DashboardController extends Controller
{
    public function index(){
        $db=DB::getInstance();
        $options=[
            "comlumns"=>["id_product",
                        "name",
                        "price",
                        "sale",
                        "image",
                        "description",
                        "id_category",
                        "tags",
                        "status",
                        "id_user",
                        "date_create",
                        "date_update",
                        "id_brand"]
        ];
        
        $lastest=["where" => "DATEDIFF(NOW(), date_create) < 10","limit"=>10,"orderBy"=>"id_product desc"];
        $tempOptions = array_merge($options, $lastest);
        $pr_lastest=$db->getAll('Products',$tempOptions);
        $sale_bests_ = [
            "where" => "tags LIKE :param",
            "params" => [
                ":param" => "%best%",
            ],
            "limit"=>3
        ];
        $sale_best=$db->getAll("Products",array_merge($options,$sale_bests_));
        $sale_ = [
            "where" => "tags LIKE :param",
            "params" => [
                ":param" => "%sale%"
            ],
            "limit"=>3
        ];
        $pr_sale=$db->getAll("Products",array_merge($options,$sale_));;
        return view('dashboard', compact('pr_lastest','sale_best','pr_sale'));
    }
}
