<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<div class="container">
        <h1 class="text-center text-primary">Register</h1>
        <span class="text-danger">* required</span>
        <!-- create form -->
        <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span style="color: red">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span style="color: red">@error('email'){{$message}}@enderror</span>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span> Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                <span style="color: red">@error('password'){{$message}}@enderror</span>

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> Address</label>
                <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span style="color: red">@error('address'){{$message}}@enderror</span>

            </div>
            <div>
            <span class="text-danger">*</span> Gender
            
            <div class="container">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">Female</label>
                </div>
            </div>
            <span style="color: red">@error('gender'){{$message}}@enderror</span>
        </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> linkedin url</label>
                <input type="text" class="form-control" name="url" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span style="color: red">@error('url'){{$message}}@enderror</span>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>