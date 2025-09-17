<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Portal extends Controller
{
    public function create(){
        return view('portal');
    }
}
