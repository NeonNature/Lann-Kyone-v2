<!DOCTYPE html>
<html>
<head>
<title>Lan Kyone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	@if (\Session::has('errors'))
      <div class="alert alert-danger">
         <p>{{ \Session::get('errors') }}</p>
      </div><br />
      @endif

     @if (\Session::has('status'))
      <div class="alert alert-success">
         <p>{{ \Session::get('status') }}</p>
      </div><br />
      @endif
  <img src="images/logo.png" alt="Logo" style="margin:0 auto; display: table;" class="img-fluid" />
  <br /><br />
  <form class="form-horizontal" action={{url('user/login')}} method="POST">
  	{{csrf_field()}}
    <div class="form-group">
      <div class="col-sm-12">
        <input type="tel" class="form-control" id="phone" placeholder="Phone Number" name="phone">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">          
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-12">
        <button type="submit" class="btn btn-block btn-outline-success">Log In</button>
      </div>
    </div>
  </form>
  <p class="text-center">
    Don't have an account? <a href={{url('user/create')}}>Register here!</a>
  </p>
</div>


</body>
</html>