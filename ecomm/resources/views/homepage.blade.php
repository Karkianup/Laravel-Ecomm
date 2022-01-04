@extends('layouts.app')
@extends('layouts.cart')

      @section('content')
      <center>
                  <h1 style="color:black;font-weight:bold;font-family:verdana">Best place to shop!!!!!</h1><hr>
                  {{-- for search Button --}}
                  <form action="/" method="POST">
                        @csrf
                        <input type="text" name="searchBar" placeholder="search products here">
                        <input type="submit" value="search" name="searchProducts">
                  </form>
                  <div class="alert-danger"> @if(session('cart-message')) {{ session('cart-message') }} @endif </div>
            
                  <div class="alert-danger">@if(session('message')) {{ session('message') }} @endif </div>
          
      
                 
                 @if(isset($_POST['searchProducts']))
                        <table>
                 
                              @foreach ($search as $product)
      
                                          <tr>
                                                <td><hr style="width:999px;color:blue"></td>
                                          </tr>
                                          <tr>
                                              <td> <a href={{"/product/details/".$product->id}}><img src="{{'images/'.$product->image}}" style="width:300px;height:200px;border:outset"> </a></td>

                                          </tr>
                                          <tr>
                                                <td><span style="color:saddlebrown:font-family:monospace;font-size:22px"><b>{{ $product->name }}</b></span></td>
                                          </tr>

                                          <tr>
                                                <td><span style="color:red;font-family:monospace;font-size:22px"><b> Rs.{{ $product->price }}</b></span></td>

                                          </tr>
                              @endforeach
                        </table>

                        @else
                             @foreach ($products as $product)
                                  <tr>
                                       <td><hr style="width:999px;color:blue"></td>
                                   </tr>
                                       <a href={{"/product/details/".$product->id}}><img src="{{asset('images/'.$product->image)}}" style="width:300px;height:200px;border:outset"> </a>
                                  
                                    {{-- <tr>
                                          <td>Name:{{ $product->name }}</td><br>
                                    </tr>

                                    <tr>
                                          <td>Category:{{ $product->category->name }}</td><br>
                                    </tr>
                                    <tr>
                                    <td>Description:{{ $product->description }}</td><br>
                                    </tr>
                                    <tr>
                                    <td>Price:{{ $product->price }} $</td><br>
                        </tr> --}}
                             @endforeach
                        @endif
                  
                 
      
      
      
      </center>    
      @endsection      