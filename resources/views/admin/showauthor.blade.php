
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
                    <td style="padding: 20px;">identifier</td>
                    <td style="padding: 20px;">fname</td>
                    <td style="padding: 20px;">lname</td>
                    <td style="padding: 20px;">Delete</td>
                </tr>
                @foreach($data as $author)
                <tr align="center" style="background-color: black; ">
                    <td >{{$author->identifier}}</td>
                    <td >{{$author->fname}}</td>
                    <td >{{$author->lname}}</td>

                    <td >
                        <a class="btn btn-danger" onClick="return confirm('are you sure')" href="{{url('deleteauthor', $author->id)}}">Delete</a>
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
