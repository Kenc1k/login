<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckCodeController extends Controller
{
    public function index()
    {
        return view('check_code');
    }
    
}
