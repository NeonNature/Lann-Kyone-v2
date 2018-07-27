<!DOCTYPE html>
<html>
<head>
	<title>Mentee registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container"> 
	@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
	<form action={{url('user')}} method="POST">
		<table>
			<input type="text" name="_token" value={{csrf_token()}}>
			<tr>
				<td><label>Full Name : </label></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td><label>Phone : </label></td>
				<td><input type="text" name="phone"></td>
			</tr>
			<tr>
				<td><label>Password : </label></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><label>Confirm Password : </label></td>
				<td><input type="password" name="confirmPassword"></td>
			</tr>
			<tr>
				<td><label>Organization : </label></td>
				<td><input type="text" name="organization"></td>
			</tr>
			<tr>
				<td><label>Gender : </label></td>
				<td><input type="radio" name="gender" value="1">Male
					<input type="radio" name="gender" value="0">Female</td>
			</tr>
			<tr>
				<td><input type="submit" name="btnSubmit" value="Register"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>