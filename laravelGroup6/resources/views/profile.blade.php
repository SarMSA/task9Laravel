<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        div.card{
            box-shadow: 0 0 15px #cf7182;
            margin: 200px auto;
            font-weight: 500;
            /* text-align: center; */
            color: #8b6b6b;
            padding: 30px 15px;
            border-radius: 10px;
            width: 50%;
            background-color: #eedde5;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
  </head>
<body class="pt-5">

        <div class="card">
            @foreach ($data as $key => $item)
            @if ($key == 'url')
                <h2> {{$key}}: <a href="{{$item}}">{{$item}}</a></h2>
            @else
                <h2>{{$key}}: {{ $item}}</h2>
            @endif
            @endforeach
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>