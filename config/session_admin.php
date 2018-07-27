<?php
//session_start();
if(! ($_SESSION['id_user']))
{
		echo "<script>window.alert('Untuk mengakses, Anda harus Login Sebagai Admin');
        window.location=('../administrator.php')</script>";
}
?>