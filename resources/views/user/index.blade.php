<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
                .w3-bar-block .w3-bar-item {padding:20px}
        </style>
    </head>

    <body>

        <!-- Sidebar (hidden by default) -->
          <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()"
            class="w3-bar-item w3-button">Close Menu</a>
            <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Products</a>
            <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
            @if (Route::has('login'))
                  @auth
                      <a href="{{ url('/home') }}" class="w3-bar-item w3-button">Home</a>
                  @else
                      <a href="{{ route('login') }}" class="w3-bar-item w3-button">Login</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
            @endif
                  @endauth
            @endif
              @if(Auth()->check())
                  <a href="{{ Route('messages') }}" class="w3-bar-item w3-button">Messages</a>
                  @endif
        </nav>

        <!-- Top menu -->
        <div class="w3-top">
          <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
          </div>
        </div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">


          <div id="row">
          <!-- Product Grid-->
          @foreach($product as $p)
              @php
                  $pictures=json_decode($p->pictures);

                  @endphp
            <div class="col-lg-3" style="margin-top:70px">
                  <img src="/images/products_images/{{ $pictures[0] }}" alt="{{ $p->name }}" style="width:200px;height:200px">
                  <h3>{{ $p->name }}</h3>
                  <p>{{ $p->description }}</p>
                  <button onclick="window.location.href='/products/{{ $p->id }}'" class="btn btn-primary">See more info</button>
            </div>
          @endforeach
          </div>

          <div style="background-color:black; position:absolute; right:0; width:15%;height:600px; padding:10px; color:white; font-size:15px;">
            <h3>Category</h3>
              <ul id="category_list">
                @foreach($category as $c)
                 <a href="?category_id={{$c->id}}"><li id="{{ $c->name }}" name="{{ $c->name}}" style="padding-top:10px;">{{ $c->name }}</li></a>
               @endforeach
             </ul>
          </div>



          <!-- Footer -->
          <footer class="w3-row-padding w3-padding-32">
            <div class="w3-third">
              <h3>FOOTER</h3>
              <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
              <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
            </div>

            <div class="w3-third">
              <h3>BLOG POSTS</h3>
              <ul class="w3-ul w3-hoverable">
                <li class="w3-padding-16">
                  <img src="/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
                  <span class="w3-large">Lorem</span><br>
                  <span>Sed mattis nunc</span>
                </li>
                <li class="w3-padding-16">
                  <img src="/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
                  <span class="w3-large">Ipsum</span><br>
                  <span>Praes tinci sed</span>
                </li>
              </ul>
            </div>

            <div class="w3-third w3-serif">
              <h3>POPULAR TAGS</h3>
              <p>
                <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
                <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
                <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
                <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
                <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
              </p>
            </div>
          </footer>

        <!-- End page content -->
        </div>

        <script>
        // Script to open and close sidebar
        function w3_open() {
          document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
          document.getElementById("mySidebar").style.display = "none";
        }
        </script>

    </body>
</html>
