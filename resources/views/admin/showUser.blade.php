
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
                    <td style="padding: 20px;">Name</td>
                    <td style="padding: 20px;">Email</td>
                    <td style="padding: 20px;">Usertype</td>
                    <td style="padding: 20px;">Address</td>
                    <td style="padding: 20px;">Phone</td>
                    <td style="padding: 20px;">action</td>
                </tr>


                @foreach($leteuser as $users)

                <tr align="center" style="background-color: black" >
                    <td style="padding: 20px;">{{$users->name}}</td>
                    <td style="padding: 20px;">{{$users->email}}</td>
                    <td style="padding: 20px;">{{$users->usertype}}</td>
                    <td style="padding: 20px;">{{$users->address}}</td>
                    <td style="padding: 20px;">{{$users->phone}}</td>
                    <td style="padding: 20px;"><a class="btn btn-danger" href="{{url('/deleteuser', $users->id)}}">Delete</a></td>
                </tr>
                @endforeach
                
            </table>

        </div>
        </div>


        <!-- main-panel ends -->
     @include('admin.script')
  </body>
</html>