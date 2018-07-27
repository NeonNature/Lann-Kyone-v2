<!DOCTYPE html>
<html>
<head>
	<title>Mentee Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
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

		<form action={{url('user/login')}} method="POST">
			<table>
				{{csrf_field()}}
				<tr>
					<td><label>Phone: </label></td>
					<td><input type="text" name="phone"></td>
				</tr>
				<tr>
					<td><label>Password: </label></td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="btnSubmit" value="Login"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>