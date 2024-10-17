<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    
    public function index()
    {
        // Return the index view
        return view('index1');
    }
}
