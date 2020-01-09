<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }
    </style>
</head>
<body>

<h2>Chat Messages</h2>

@foreach($conversation as $c)
    @if(!$user2)
<div class="container">
    <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
    <p> {{ $c->message }} </p>
    <span class="time-right">{{ $c->created_at }}</span>
</div>
@endif
    @if($user2)
<div class="container darker">
    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
    <p>{{ $c->message }}</p>
    <span class="time-left">{{ $c->created_at }}</span>
</div>
@endif
@endforeach



<form method="POST" action="/send_message/{{ $product->id }}">

    @csrf

    <textarea name="message" id="message" cols="30" rows="10"></textarea>

    <button type="Submit">Send message</button>

</form>

</body>
</html>





