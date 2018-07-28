
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register - Lan Kyone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
<script>
   function checkForm(form)
  {
    if(form.name.value == "") {
      alert("Error: You have a name, right?");
      form.name.focus();
      return false;
    }
    sn = /^[a-zA-Z\s]+$/;
    re = /^\w+$/;
    if(!sn.test(form.name.value)) {
      alert("Error: Your name seems weird. Use only letters and spaces please.");
      form.name.focus();
      return false;
    }
    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(form.pwd1.value.length < 6) {
        alert("Error: Please make a password greater than 6 characters!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.name.value) {
        alert("Error: You shouldn't use your name as your password!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error: Please put at least one number in your password!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error: We sense that your passwords don't match!");
      form.pwd1.focus();
      return false;
    }
    return true;
  }
</script>

</head>
<body class="bg-dark">

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
  <br />
  <h2 style="display: table; margin:0 auto;" class="text-info">Register</h2>
  <hr />
    <br />
 
    <form class="form-horizontal" name="register" action={{url('user')}} method="POST" onsubmit="return checkForm(this);">
      <input type="hidden" name="_token" value={{csrf_token()}}>
          <input type="text" class="form-control mt-2" id="name" placeholder="Full name" name="name" required />
          <input type="text" class="form-control mt-2" id="org" placeholder="Organization" name="organization" required />
      <label class="radio-inline  mt-2" style="margin-right:70px;">
      <input type="radio" name="gender" value="1"> Male
    </label>
    <label class="radio-inline  mt-2">
      <input type="radio" name="gender" value="0"> Female
    </label>
          <input type="tel" class="form-control mt-2" id="phone" placeholder="Phone number" name="phone" required />
          <input type="password" class="form-control mt-2" id="pwd1" placeholder="Password" name="password" required />
          <input type="password" class="form-control mt-2" id="pwd2" placeholder="Confirm password" name="confirmPassword" required />
          <button type="submit" class="btn shadow btn-outline-success btn-block mt-2" name="ssubmit">Register</button>
        </div>
      </div>
    </form>
  </div>
<hr />
</body>

</html>