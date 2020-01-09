@extends('layouts.layout')

@section('title', 'profile')

@section('content')

    @foreach($products as $p)
        <div class="col-lg-3" style="margin-top:70px">
            <img src="{{ $p->picture }}" alt="{{ $p->name }}" style="width:200px;height:200px">
            <h3>{{ $p->name }}</h3>
            <p>{{ $p->description }}</p>
            <button onclick="window.location.href='/products/{{ $p->id }}'" class="btn btn-primary">See more info</button>
        </div>
    @endforeach


    <button onclick="window.location.href='/create_product/{{ $user->id }}'" class="btn btn-primary">Add product</button>




@stop
