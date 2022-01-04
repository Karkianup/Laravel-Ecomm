<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class Cart extends Model
{
    use HasFactory;
    function product(){
        return $this->hasOne(product::class,'id','product_id');
    }
}
