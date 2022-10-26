
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
                    <td style="padding: 20px;">Subject</td>
                    <td style="padding: 20px;">Messages</td>
                    <td style="padding: 20px;">Action</td>
                </tr>


                @foreach($takasms as $smss)

                <tr align="center" style="background-color: black" >
                    <td style="padding: 20px;">{{$smss->name}}</td>
                    <td style="padding: 20px;">{{$smss->email}}</td>
                    <td style="padding: 20px;">{{$smss->subject}}</td>
                    <td style="padding: 20px;">{{$smss->message}}</td>
                    <td style="padding: 20px;"><a class="btn btn-danger" href="{{url('/deletesms', $smss->id)}}">Delete</a></td>
                </tr>
                @endforeach
                
            </table>

        </div>
        </div>


        <!-- main-panel ends -->
     @include('admin.script')
  </body>
</html>