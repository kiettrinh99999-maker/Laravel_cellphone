<?php

namespace App\Models;
use App\Models\DB;

class Product{
    public $ID;
    public $Name;
    public $Description;
    public $Price;
    public $Sale;
    public $Image;
    public $Tags;
    public $Status;
    public $ID_Cate;
    public $ID_User;
    // public function product(){
    //     return [
    //         $this->$ID,
    //         $this->Name,
    //         $this->Description,
    //         $this->Price,
    //         $this->Sale,
    //         $this->Image,
    //         $this->Tags,
    //         $this->Status,
    //         $this->ID_Cate,
    //         $this->ID_User
    //     ];
    // }

}