@include ('helpers.header')
<div class="container">
    <h1 class="text-center text-primary">create new task</h1>
    <span class="text-danger">* required</span>
    <!-- create form -->
    <form action="{{ url('/student/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> title</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span style="color: red">@error('name'){{$message}}@enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> description</label>
            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span style="color: red">@error('email'){{$message}}@enderror</span>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span> date</label>
            <input type="date" class="form-control" name="password" id="exampleInputPassword1">
            <span style="color: red">@error('password'){{$message}}@enderror</span>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span> from</label>
            <input type="time" class="form-control" name="password" id="exampleInputPassword1">
            <span style="color: red">@error('password'){{$message}}@enderror</span>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span> to</label>
            <input type="time" class="form-control" name="password" id="exampleInputPassword1">
            <span style="color: red">@error('password'){{$message}}@enderror</span>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include ('helpers.footer')
