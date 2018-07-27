<?php
include "config/koneksi.php";
$pass=md5($_POST['password']);
$level=$_POST['level'];
$username = $_POST['id_user'];
if ($level=='Admin')
{
$login=mysql_query("SELECT * FROM rb_users
			WHERE email='".mysql_real_escape_string($username)."' AND password='$pass' AND level='$level'");
$cocok=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($cocok > 0){
	session_start();
	//session_register("SES_ADMIN");
	$_SESSION['id_user']     = $r['id_user'];
	$_SESSION['namauser']     = $r['username'];
	$_SESSION['email']    	= $r['email'];
  	$_SESSION['namalengkap']  = $r['nama_lengkap'];
  	$_SESSION['passuser']     = $r['password'];
  	$_SESSION['leveluser']    = $r['level'];

	header('location:admin/media.php?module=home');
	}
else {
echo "<script>window.alert('Username atau Password anda salah.');
				window.location='administrator.php'</script>";
	}
}

else if ($level=='Member')
{
$login=mysql_query("SELECT * FROM rb_users
			WHERE email='".mysql_real_escape_string($username)."' AND password='$pass' AND level='$level'");
$cocok=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($cocok > 0){
	session_start();
	//session_register("SES_MEMBER");
	$_SESSION['id_user']     = $r['id_user'];
	$_SESSION['passuser']     = $r['password'];
  	$_SESSION['namalengkap']  = $r['nama_lengkap'];
	$_SESSION['email']    	= $r['email'];
	$_SESSION['telp']    		= $r['no_telp'];
	$_SESSION['alamat']    	= $r['alamat_lengkap'];
	$_SESSION['umur']   	 	= $r['umur'];
  	$_SESSION['leveluser']    = $r['level'];

	header('location:member/media.php?module=home');
	}
else {
echo "<script>window.alert('Username atau Password anda salah.');
				window.location='index.php?module=form_login'</script>";
	}
}

?>