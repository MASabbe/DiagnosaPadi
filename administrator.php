<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pakar - Log in</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="view/css/bootstrap.css" rel="stylesheet">
	<link href="view/css/admin.css" rel="stylesheet">
</head>
<body>
<h1>LOGIN</h1>
  <div class="container">
    <div class="content">
      <div class="row">
        <div class="login-form">
          <form action="cek_login.php" method="POST" onSubmit="return validasi(this)">
            <fieldset>
              <div class="clearfix">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
						<input type="text" name="id_user" placeholder="Username">
						<input type="hidden" name="level" value="Admin">
					</div>
			  </div>
              <div class="clearfix">
					<div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span>
						<input type="password" name="password" placeholder="Password">
					</div>
			  </div>
             <center> 
			 <br/><button class="btn btn-primary" type="submit">Sign in</button> 
			 </center>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
