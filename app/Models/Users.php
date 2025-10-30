<?php

namespace App\Models;

class Users{

    public $ID;
    public $Username;
    public $Email;
    public $Password;
    public $Status;
    public $Role;

    public function user(){
        return [
            $this->ID,
            $this->Username,
            $this->Email,
            $this->Password,
            $this->Status,
            $this->Role
        ];
    }
}
