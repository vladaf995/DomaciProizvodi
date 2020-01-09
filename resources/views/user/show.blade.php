@extends('layouts.layout')


@section('title')
  Product
@endsection


@section('content')

<div class="jumbotron">
  <div class="description">
      <span>Add by: <a href="{{route('user.profile',$product->user)}}">{{$product->user->name}}</a></span>
      <span>Category: <a href="{{route('welcome')}}?category_id={{$product->category_id}}">{{$product->category->name}}</a></span>
    <h1>{{ $product->name }}</h1>
    <br>
    <h3>{{ $product->description }}</h3>
  </div>
</div>

<div class="jumbotron">
  <div class="description2">
  	<h6>Price</h6>
    <p>{{ $product->price }}</p>
    <h6>Quantity</h6>
    <p>{{ $product->quantity }}</p>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
  <h3>Pictures</h3><br>
  <div class="row">
    <div class="col-sm-3">
      <img src="{{$product->picture}}" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div>

<br><br>

<button onclick="window.location.href='/products/{{ $product->id }}/edit'" type="button" class="btn btn-primary">Edit product</button>

<form method="POST" action="/products/{{ $product->id }}">
  @method('DELETE')
  @csrf
  <button type="submit" class="btn btn-primary">Delete product</button>
</form>

<button onclick="window.location.href='/message_show/{{ $product->id }}'" type="button" class="btn btn-primary">Send message</button>


<br><br>

<footer class="container-fluid text-center">
  <p>Design by Dekster</p>
</footer>


@endsection
