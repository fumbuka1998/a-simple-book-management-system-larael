
<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  </head>
  <body>

      <!-- partial -->
      @include('admin.sidebar')
      @include('admin.navbar')

        <!-- partial -->



        <div  style="padding-bottom:30px; " class="container-fluid page-body-wrapper">
        <div class="container" >

            @if(session()->has('message'))
                <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert"> x </button>

                {{session()->get('message')}}

                </div>
            @endif
            <table>
                <tr align="center" style="background-color: grey">
                    <td style="padding: 20px;">isbn</td>
                    <td style="padding: 20px;">name</td>
                    <td style="padding: 20px;">year</td>
                    <td style="padding: 20px;">page</td>
                    <td style="padding: 20px;">Image</td>
                    <td style="padding: 20px;">Update</td>
                    <td style="padding: 20px;">Delete</td>
                </tr>
                @foreach($data as $book)
                <tr align="center" style="background-color: black; ">
                    <td >{{$book->isbn}}</td>
                    <td >{{$book->name}}</td>
                    <td >{{$book->year}}</td>
                    <td >{{$book->page}}</td>
                    <td >
                        <img height="100px" width="100px" src="/vitabuImage/{{$book->image}}">
                    </td>
                    <td >
                        <a class="btn btn-primary" href="{{url('updatebook', $book->id)}}">Update</a>
                    </td>
                    <td >
                        <a class="btn btn-danger" onClick="return confirm('are you sure')" href="{{url('deletebook', $book->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
        </div>


        <!-- main-panel ends -->
     @include('admin.script')
  </body>
</html>
