<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard(){
        return view('admin.dashboard');
    }

    public function showFlotChart(){
        return view('admin.flot');
    }

    public function showMorisChart(){
        return view('admin.moris');
    }

     public function showTable(){
        return view('admin.table');
    }
    public function showForms(){
        return view('admin.forms');
    }
    public function showPanelWell(){
        return view('admin.panels-wells');
    }
    public function showButton(){
        return view('admin.buttons');
    }
    public function showNotifi(){
        return view('admin.notifications');
    }

    public function showTypo(){
        return view('admin.typography');
    }
    public function showIcons(){
        return view('admin.icons');
    }
    public function showGrid(){
        return view('admin.grid');
    }
    public function showBlank(){
        return view('admin.blank');
    }
    public function showLogin(){
        return view('admin.login');
    }
    
}
