@extends('layouts.layout')
@section('content')

<div class="container">
  <form method="POST" action="/products/{{ $product->id }}">
  	@method('patch')
  	@csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control {{ $errors->has('name') ? 'alert alert-danger' : '' }}" id="name" name="name" value="{{ $product->name }}" value="{{ old('name') }}" required>

      <label for="description">Description:</label>
      <input type="text" class="form-control {{ $errors->has('description') ? 'alert alert-danger' : '' }}" id="description" name="description" value="{{ $product->description }}" value="{{ old('description') }}" required>

      <label for="price">Price:</label>
      <input type="text" class="form-control {{ $errors->has('price') ? 'alert alert-danger' : '' }}" id="price" name="price" value="{{ $product->price }}" value="{{ old('price') }}" required>

      <label for="quantity">Quantity:</label>
      <input type="text" class="form-control {{ $errors->has('quantity') ? 'alert alert-danger' : '' }}" id="quantity" name="quantity" value="{{ $product->quantity }}" value="{{ old('quantity') }}" required>

      <label for="picture">Picture:</label>
      <input type="text" class="form-control {{ $errors->has('picture') ? 'alert alert-danger' : '' }}" id="picture" name="picture" value="{{ $product->picture }}" value="{{ old('picture') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <button type="button" class="btn btn-danger">Cancel</button>
  </form>


  @include('errors')

</div>




@stop
