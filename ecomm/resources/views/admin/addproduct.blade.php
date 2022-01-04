@extends('layouts.app')
@section('content')
<center>
    <h2>@if(session('message')) {{ session('message') }}@endif </h2>
    <h1>Add new Products</h1>
  <form action="/addProducts" method="POST" enctype="multipart/form-data">
    @csrf
      <input type="text" name="name" placeholder="enter product name"><br>
      <input type="file" name="image"><br>
      <textarea name="description" rows="2" cols="20" placeholder="description of the products"></textarea><br>
      <input type="number" name="price" placeholder="enter product price"><br>
      <select name="category">
            <option selected disabled>Choose Your Category</option>  
            @foreach ($category as $cat)
            <option value="{{$cat->id}}">{{ $cat->name }}</option>
              @endforeach
              
      </select><br>
     

      <input type="submit" value="submit">

       
  </form>
</center>
@endsection