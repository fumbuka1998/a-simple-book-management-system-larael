
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">


    <title>Nyachirolab</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--
-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>
        @if(session()->has('message'))
            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert"> x </button>

            {{session()->get('message')}}

            </div>
        @endif

      <div class="latest-products">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="section-heading">
                    <h2>VITABU VYETU</h2>
                    <a href="{{url('bidhaa')}}">Vitabu vyote hapa <i class="fa fa-angle-right"></i></a>

                    <form action="{{'/search'}}" method="get" class="form-inline" style="float: right; padding: 10px">
                      @csrf
                    <input class="form-control" type="search" name="search" placeholder="search">
                    <input type="submit" value="Search" class="btn btn-success">

                    </form>


                  </div>
        </div>


          @foreach($data as $book)

          <div class="col-md-4">
            <div class="product-item">
              <a href="{{url('bidhaaDES',$book->id)}}"><img height="400px" width="200px" src="/vitabuImage/{{$book->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>ISBN {{$book->isbn}}</h4></a>
                <h6>NAME: {{$book->name}}</h6>
                <p>YEAR: {{$book->year}}</p>

                <form action="{{url('sendcomment')}}" method="post">
                 @csrf

                 <input  type="text" value="comment"  class="form-control" style="width:200px;" name="comment">
                <br>
                 <input class="btn btn-primary" type="submit" value="comment">
                 <input class="btn btn-primary" type="submit" value="like">
                 

                </form>

              </div>
            </div>
          </div>

          @endforeach
          @if(method_exists($data,'links'))

          <div class="d-flex justify-content-center" >

              {!! $data->links() !!}

          </div>

          @endif

        </div>
      </div>
    </div>
  </body>

</html>
