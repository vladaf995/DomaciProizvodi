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

        .message{
            background-color: darkred;
            color: white;
        }
        a{
            color: white;
        }
    </style>
</head>
<body>

<h2>Chat Messages</h2>

    @foreach($sender as $s)
        <div class = 'message'>
        <p>{{ $s->name}}</p>
            <a href="message_show"><p>See messages</p></a>
        </div>
@endforeach



</body>
</html>






