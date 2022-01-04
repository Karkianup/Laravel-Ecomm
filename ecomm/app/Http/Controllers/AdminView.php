<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminView extends Controller
{
    function productView(){
        return view('admin.addproduct');
    }
}
