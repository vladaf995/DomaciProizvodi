@extends('layouts.layout')

@section('content')


<div class="container">

    <form enctype="multipart/form-data" method="POST" action="{{ route('store_product') }}">

    	@csrf

    	<div class="form-group">
	  		<label for="name">Name:</label>
	        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
	    </div>
	    <div class="form-group">
	        <label for="description">Description:</label>
	        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" required>
	    </div>
	        <div class="form-group">
	        <label for="quantity">Quantity:</label>
	        <input type="text" class="form-control" name="quantity" id="quantity" value="{{ old('quantity') }}" required>
	    </div>
	    <div class="form-group">
	        <label for="price">Price:</label>
	        <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" required>
	    </div>
	    <div class="form-group">
	        <label for="picture">Picture:</label>
	        <input type="file" class="form-control" multiple name="pictures[]" id="pictures" value="{{ old('picture') }}" required>
	    </div>

	    <div class="form-group">
	        <label for="category_id">Category:</label>
            <select name="category_id" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
	    </div>

	    <button type="submit" class="btn btn-primary">Add product</button>

	    <button type="button" class="btn btn-primary">Cancel</button>
    </form>

    @include('errors')


</div>




@stop
