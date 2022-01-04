<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;

class product extends Model
{
    use HasFactory;
    
    
      function category(){
          return $this->hasOne(Category::class,'id','category_id');
    }

    function carts(){
        return $this->belongsTo(Cart::class,'id','product_id');
    }

   
   
}
