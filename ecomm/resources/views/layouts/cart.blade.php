<?php
use App\Http\Controllers\MainController;
if(auth()->check()){
 $total=MainController::displayCart();
}
?>
<style>
    .nav{
        background-color:#F2F3B5;
        width:100%;
        position: absolute;

    }
    .nav a{
        position: relative;
        text-decoration: none;
        color:black;
        font-size:32px;
        left:84%;
        top:9vh;
        
    }
</style>

<div class="nav">
    @if(auth()->check())
    
        <a href="/cart/products">Cart ({{  $total  }})</a>
    @else
        <a href="/login">Cart ({{  0  }})</a>
     
    @endif
    </div>

