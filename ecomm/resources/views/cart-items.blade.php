@extends('layouts.app')

@section('content')
    <center>
        <div class="alert-danger">
            @if(session('message')){{ session('message') }} @endif
        </div>
        <a href="/order/details" class="btn btn-success">Order</a>
    </center>
     
     @foreach ($cartItems as $c)<br>


          <div class="container"><hr style="color:black;height:12px">
             

                   <div class="row">
                      <a href={{ "/product/details/".$c->product->id }}>
        
                                <div class="col-4">
                                        <img src="{{ asset('images/'.$c->product->image) }}" style="width:200px;height:200px">

                                </div>
                                <div class="col-2">
                                    <span style="color:black;font-size:33px;font-family:monospace;font-weight:bold"> name:{{ $c->product->name }}<br>
                                                                                price:Rs,{{ $c->product->price }}</span>
                                                                                
                                </div>
                     </a>
                                <div class="col-3">
                                    <a href={{"/remove/cart/items/".$c->id}} style="color:black;font-size:22px">Remove</a>
                                </div>
                    </div>

           </div>


   @endforeach
@endsection
