<!DOCTYPE html>
<html lang="en">
  <head>
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
            <h1 class="title" > Add books </h1>

        @if(session()->has('message'))
            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert"> x </button>

            {{session()->get('message')}}

            </div>
        @endif


        <form action="{{url('uploadbook')}}" method="post" enctype="multipart/form-data">
            @csrf

        <div style="padding:15px;">
            <label >book isbn</label>
            <input style="color:black;" type="text" name="isbn" placeholder="book isbn" required="">
            </div>

            <div style="padding:15px;">
            <label >book name</label>
            <input style="color:black;" type="text" name="name" placeholder="book name" required="">
            </div>

            <div style="padding:15px;">
            <label >year</label>
            <input style="color:black;" type="text" name="year" placeholder="year" required="">
            </div>

            <div style="padding:15px;">
            <label >page</label>
            <input style="color:black;" type="text" name="page" placeholder="book pages" required="">
            </div>

            <div style="padding:15px;">

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
