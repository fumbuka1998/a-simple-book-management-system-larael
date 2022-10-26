
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  @include('admin.css')

  <style>
    .title{
        color: white;
        padding-top: 25px;
        font-size: 25px;
    }

    label{
        display: inline-block;
        width: 200px;
    }
  </style>

  </head>
  <body>

      <!-- partial -->
      @include('admin.sidebar')
      @include('admin.navbar')

        <!-- partial -->


        <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title" > Update books </h1>
        @if(session()->has('message'))
            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert"> x </button>

            {{session()->get('message')}}

            </div>
        @endif



        <form action="{{url('updatebook', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf

        <div style="padding:15px;">
            <label >book isbn</label>
            <input style="color:black;" type="text" name="isbn" value="{{$data->isbn}}" required="">
            </div>

            <div style="padding:15px;">
            <label >book name</label>
            <input style="color:black;" type="number" name="name" value="{{$data->name}}" required="">
            </div>

            <div style="padding:15px;">
            <label >year</label>
            <input style="color:black;" type="text" name="year" value="{{$data->year}}" required="">
            </div>

            <div style="padding:15px;">
            <label >page</label>
            <input style="color:black;" type="text" name="page" value="{{$data->page}}" required="">
            </div>

            <div style="padding:15px;">
            <label >Old Image</label>
            <img height="100px" width="100px" src="/vitabuImage/{{$data->image}}" >
            </div>

            <div style="padding:15px;">
               <label >choose image</label>
            <input  type="file" name="file">
            </div>

            <div style="padding:15px;">
            <input class="btn btn-success" type="submit" >
            </div>

        </form>

        </div>

    </div>


        <!-- main-panel ends -->
     @include('admin.script')
  </body>
</html>
