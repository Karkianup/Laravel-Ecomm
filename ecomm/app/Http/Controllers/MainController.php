<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;




class MainController extends Controller
{
function insertProduct(Request $req){
    $product=new product;
    $product->name=$req->name;
    $product->description=$req->description;
    $product->category_id=$req->category;
    $product->price=$req->price;
   
    //to insert a new image
    $file=$req->file('image');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
    $file->move('images/',$filename);
    $product->image=$filename;
    $save=$product->save();
    if($save){
        return redirect()->back()->with('message','saved successfully');
    }
}
 
  
  //for displaying products
    function displayingProduct(){
        $product=product::with('category')->get();
           return view('homepage',["products"=>$product]);

    }
  

     //for searching using product's name
     function searchProducts(Request $req){
            $search=product::with('category')->where('name','LIKE',"%".$req->searchBar."%")->get();
              if(count($search)){
               return view('homepage',[
                  "search"=>$search
              ]);
            }else{
                return redirect('/')->with('message','no search found');

            }
        }
        
     //for search using category
     function displayCategories(){
         
         $cat=Category::all();
         return view('admin.addproduct',[
             "category"=>$cat,

         ]);
     }

     //for showing product details in product details page
    function details($id){
        $details=product::find($id);
        return view('details',[
            "details"=>$details,
        ]);

    }

    function addToCart(Request $req){
          $user=auth()->user()->id;
             $cardId=Cart::where('product_id',$req->product_id)->where('user_id',$user)->get();

                // $cardId=DB::table('carts')->select('*')->where('product_id',$req->product_id)->where('user_id',$user)->get();
                if(count($cardId)){
                     return redirect('/cart/products')->with('message','Item already added in the cart');
                   
                }else{
                $cart=new Cart();
                $cart->user_id=$user;
                $cart->product_id=$req->product_id;
                $save=$cart->save();
                if($save){
                    return redirect('/')->with('cart-message','successfully added to cart');

                }
    }
        
    }
    //to add total number of item added in cart
    static function displayCart(){
        $user_id=auth()->user()->id;
        return Cart::where('user_id','=',$user_id)->count();
    

    }

    //to display user items added in cart
    function cartItems(){
        // $cartData=DB::table('products')
        //       ->select('*')
        //       ->join('carts','products.id','=','carts.product_id')->get();
         $user_id=auth()->user()->id;
       $cartData=Cart::with('product')->where('user_id',$user_id)->get();
       if(count($cartData)){
                return view('cart-items',[
                    "cartItems"=>$cartData

            ]);

       }
       else{
            return redirect('/cart/products')->with('message','m')  ;  
        
       }
        
    }
     function removeCartItems($id){
          $cartItems=Cart::find($id);
          $delete=$cartItems->delete();
           if($delete){
            //    return redirect()->back()->with('message','successfully removed items from carts');
            return redirect('/cart/products')->with('message','Items removed from the cart');

        }
     }
     function orderInfo(){
         $sum=0;
        $user_id=auth()->user()->id;
         $cartData=Cart::with('product')->where('user_id',$user_id)->get();
         $productCount=Cart::with('product')->where('user_id',$user_id)->count('user_id');

          foreach($cartData as $c){
               $sum=$sum+$c->product->price;
          }
        
         return view('order-details',[
             'cartData'=>$cartData,
             'totalSum'=>$sum,
             'productCount'=>$productCount,

         ]);

     }

     function submitOrder(Request $req){
         $user_id=auth()->user()->id;
         $cart=Cart::where('user_id',$user_id)->get();
         foreach($cart as $c){
         $order=new Order;
             
            $order->user_id=$c->user_id;
           $order->product_id=$c->product_id;
            $order->payment_method=$req->payment;
            $order->total_sum=$req->total_sum;
            $order->delivery_status="pending";
            $order->payment_status="pending";
            $save=$order->save();
            }
            Cart::where('user_id',$user_id)->delete();
            return redirect('/')->with('message','ordered placed successfully');





         }

     }





    


