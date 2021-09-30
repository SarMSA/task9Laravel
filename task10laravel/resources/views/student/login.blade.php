@include ('helpers.header')
<div class="container">

    <h1 class="text-center text-primary">login</h1>
    
    <a href="{{url('student/create')}}" class="text-primary">Sign up</a>
    <span class="text-danger d-block">* required</span>
    {{session()->get('message')}}
    <!-- create form -->
    <form action="{{ url('/student/dologin') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span style="color: red">@error('email'){{$message}}@enderror</span>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span> Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            <span style="color: red">@error('password'){{$message}}@enderror</span>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include ('helpers.footer')
