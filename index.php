<?php 
include "config/koneksi.php";
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar - Penyakit Pada Tanaman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Robby Prihandaya">
	<link href="view/css/bootstrap.min.css" rel="stylesheet">
	<link href="view/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="view/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon.ico">
	<script type="text/javascript" src="view/js/ga.js"></script>
	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/jscript_jquery-1.6.4.js"></script>
	<script type="text/javascript" src="view/js/jquery.validate.js"></script>
	  
</head>

<body>
<div style="padding-top:2%" class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
		
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container-fluid">
						 <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								<li><a href="index.php?module="><i class="icon-home icon-black"></i> Home</a></li>
								<li><a href="index.php?module=about"><i class="icon-user icon-black"></i> About Us</a></li>
								<li><a href="index.php?module=help"><i class="icon-wrench icon-black"></i> Help</a></li>
							</ul>
							<ul class="nav pull-right">
								<li class="divider-vertical"></li>
								<li class="dropdown">
									 <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-globe icon-black"></i> Account<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li><a href="index.php?module=form_login">Login</a></li>
										<li><a href="index.php?module=register">Register</a></li>
									</ul>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
				
			</div>
			<div class="row-fluid">
				<div class="span12"><br/>
				<?php include "content.php"; ?>
				</div>
				
			</div>
			<div class="well">
				<div class="span12">
					<center> Design by Annisa (2016) - STMIK AKAKOM</center>
				</div>
			</div>
		</div>
	</div>
</div>	
</body>
</html>