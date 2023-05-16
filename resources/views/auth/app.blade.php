<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>status200</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- jwt token check start -->
    <script>
      var token = localStorage.getItem('token')
      if (window.location.pathname == '/login' || window.location.pathname == '/register') {
        if (token != null) {
          window.location = '/'          
        }        
      } else {
        if (token == null) {
          window.location = '/login'          
        }
        
      }
    </script>
    <!-- jwt token check end -->
  </head>
  <body class="bg-primary">
    <div class="container-fluid bg-primary ">
      <div class="row ">
        <div class="offset-1 col-3 my-2 text-white fw-bold ">Datacense</div>
      </div>
      @yield('content')
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  
  </body>
</html>