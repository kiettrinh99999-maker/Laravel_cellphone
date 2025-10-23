<?php

namespace App\Models;

class Category{
    public $ID;
    public $Name;
    public $Status;
    
    public function __construct(){
        // $this->ID=0;
        // $this->Name=null;
        // $this->Status=0;
    }
    
    public function category(){

        return [
            $this->$ID,
            $this->Name,
            $this->Status
        ];
    }
    public function category_table($table){
        return [
            $this->$ID=$table["ID"],
            $this->Name=$table["Name"],
            $this->Status=$table["Status"]
        ];
    }
}