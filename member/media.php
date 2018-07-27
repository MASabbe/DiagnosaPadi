<?php 
ob_start();	
session_start();
  include "../config/koneksi.php";
  include "../config/fungsi_indotgl.php";
  include "../config/class_paging.php";
  include "../config/library.php";
  include "../config/session_member.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar - Penyakit Pada Tanaman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	<link href="../view/css/bootstrap.min.css" rel="stylesheet">
	<link href="../view/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../view/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="../view/img/favicon.png">
	<script type="text/javascript" src="../view/js/ga.js"></script>
	<script type="text/javascript" src="../view/js/jquery.min.js"></script>
	<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../view/js/jquery.min.js"></script>
	<script type="text/javascript" src="../view/js/jscript_jquery-1.6.4.js"></script>
	
	<script type="text/javascript" src="../view/js/jquery.validate.js"></script>
	  <script type="text/javascript">
	  $(document).ready(function(){
			$('#registerHere input').hover(function()
			{
			$(this).popover('show')
		});
			$("#registerHere").validate({
				rules:{
					nama_lengkap:"required",
					email:{
							required:true,
							email: true
						},
					no_telp:{
						required:true,
						minlength: 11
					},
					gender:"required"
				},
				messages:{
					nama_lengkap:"Enter your Full Name",
					email:{
						required:"Enter your email address",
						email:"Enter valid email address"
					},
					no_telp:{
						required:"Enter your Phone Number",
						minlength:"Phone Number must be minimum 11 characters"
					},
					gender:"Select Gender"
				},
				errorClass: "help-inline",
				errorElement: "span",
				highlight:function(element, errorClass, validClass) {
					$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
				}
			});
		});
	  </script>
</head>

<body>
<div style='padding-top:2%;' class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
		
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container-fluid">
						 <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								<li><a href="media.php?module=home"><i class="icon-home icon-black"></i> Home</a></li>
								<li><a href="media.php?module=profilkami"><i class="icon-user icon-black"></i> About Us</a></li>
								<li><a href="media.php?module=help"><i class="icon-book icon-black"></i> Help</a></li>
								
							</ul>
							<ul class="nav pull-right">
								<li class="divider-vertical"></li>
								<li class="dropdown">
									 <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-globe icon-black"></i> Apa Kabar, 
									 	<?php 
									 	echo $_SESSION['namalengkap']; 
									 	?>! <strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li><a href="../logout.php">Logout</a></li>
										<li><a href="media.php?module=account">Setting Account</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php 
			$sql=mysql_query("SELECT * FROM rb_users WHERE id_user='$_SESSION[id_user]'");
			$r=mysql_fetch_array($sql);
				if (empty($r['alamat_lengkap']) OR empty($r['umur'])){
				echo "<div class='alert alert-error'>
						<b>Warning!</b>, Silahkan Melengkapi Data Profile anda terlebih dahulu sebelum melakukan konsultasi pakar, klik <a href='media.php?module=account'>Account Setting</a> NOW!!!
					</div>";
				}else{
					echo "";
				}
			?>
				
			<div class="row-fluid">
				<div class="span8"><br/>
				<?php include "content.php"; ?>
				</div>
				<div class="span4">
					
					<?php include "sidebar.php"; ?>
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

<script type="text/javascript" src="../view/js/table_filter.js"></script>
<script type="text/javascript">
    (function($) {
        var table = $('#twitter-table');
        var index = 2;
        var input = $('#filter');

        zFilter.setup(input, table, index);

    })(jQuery);
</script>