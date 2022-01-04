<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class View extends Controller
{
    function homePage(){
        return view('homepage');
    }

    function displayView(){
        return view('details');
    }
    function cartProducts(){
        return view('cart-items');
    }
    function orderDetails(){
        return view('order-details');

    }
  
}
