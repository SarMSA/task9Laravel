@include ('helpers.header')
<div class="container">
    <h1 class="text-center text-primary">update data</h1>
    <span class="text-danger">* required</span>
    <!-- create form -->
    <form action="{{ url('/student/'.$data['id']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> Name</label>
            <input type="text" class="form-control" name="name" value="{{$data['name']}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span style="color: red">@error('name'){{$message}}@enderror</span>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> Email address</label>
            <input type="email" class="form-control" name="email" value="{{$data['email']}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span style="color: red">@error('email'){{$message}}@enderror</span>

        </div>
        <div class="mb-3">
            <img style="width: 100px; height:150px" src="{{url('images/'.$data['image'])}}" alt="">
            <label for="formFile" class="form-label d-block  mt-3">
                <span class="text-danger">*</span>Update File
            </label>
            <input class="form-control " type="file" name="image" id="formFile">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include ('helpers.footer')




