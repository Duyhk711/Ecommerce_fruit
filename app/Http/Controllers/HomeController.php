<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $pages_title = "Dashboard";
        return view('admins.index',['pages_title' => $pages_title]);
    }

    public function home() {
        // $pages_title = "Dashboard";
        return view('home');
                    
    }

    
}
