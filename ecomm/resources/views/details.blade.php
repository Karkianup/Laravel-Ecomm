@extends('layouts.app')
@extends('layouts.cart')

@section('content')

  <div class="container">
     <div class="row">
         <div class="col-4">
          <img src="{{asset('images/'.$details['image'])}}" style="width:200px;height:300px">

         </div>
         <div class="col-5">
              <h1><span style="color:green;font-weight:bold">Product Name:</span><span style="color:blue;font-weight:bold">{{ $details->name }}</span><br></h1>
              <h1><span style="color:green;font-weight:bold">Description:</span><span style="color:blue;font-weight:bold">{{ $details->description }}</span><br></h1>
              <h1><span style="color:green;font-weight:bold">price:</span><span style="color:blue;font-weight:bold">{{ $details->price }} $</span><br></h1>
              
              <form action="/add-to-cart" method="POST">
                 @csrf
                  <input type="hidden" name="product_id" value="{{ $details->id }}"><br><br>
                  <input type="submit" value="Add-to-cart" class="btn btn-primary">
              </form>

         
          </div>

     </div>
  </div>
@endsection