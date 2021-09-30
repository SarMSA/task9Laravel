@include ('helpers.header')

<div class="container">


    <div class="page-header">
        <h1>Read Users </h1> 
        <br>

      {{-- {{ auth()->user()->name }} --}}
      <br>

    <a href="{{ url('/student/logOut') }}">LogOut</a>    ||    <a href="{{ url('/student/create') }}">create</a>
    </div>

@if (session()->get('message') )
    {{ session()->get('message') }}   
    
@endif

    <!-- PHP code to read records will be here -->



    <table class='table table-hover table-responsive table-bordered'>
        <!-- creating our table heading -->
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>title</th>
            <th>description</th>
            <th>day</th>
            <th>start time</th>
            <th>end time</th>

        </tr>
<?php $i= 1;?>


@foreach ($data as $fetchedData )
        <tr>

            <td>{{ $i++ }}</td>

            <td>{{$fetchedData->id  }}</td>
            <td><img style="width: 100px; height: 100px;" src="{{ url('images/'.$fetchedData->image)}}" alt=""></td>
            <td>{{$fetchedData->name  }}</td>
            <td>{{$fetchedData->email  }}</td>
            <td>
                <form action="{{ url('student/'.$fetchedData->id) }}" class="d-inline-block" method="post">
                    @method('delete')
                    @csrf
                       <div class="not-empty-record">
                           <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</button>
                       </div>
                   </form>
                <a href='{{ url('/student/'.$fetchedData->id.'/edit') }}' class='btn btn-primary m-r-1em'>Edit</a>
            </td>

        </tr>



        @endforeach

        <!-- end table -->
    </table>
    {{ $data->links('pagination.pages') }}
</div>
<!-- end .container -->
@include ('helpers.footer')
