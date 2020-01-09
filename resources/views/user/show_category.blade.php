<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<body>

	      <!-- Product Grid-->
          @foreach($product as $p)
          	@if($p->category == $category_name->name)
            <div class="col-lg-3" style="margin-top:70px">
                  <img src="{{ $p->picture }}" alt="{{ $p->name }}" style="width:200px;height:200px">
                  <h3>{{ $p->name }}</h3>
                  <p>{{ $p->description }}</p>
                  <button onclick="window.location.href='/products/{{ $p->id }}'" class="btn btn-primary">See more info</button>
            </div> 
            @endif
          @endforeach

</body>


</html>