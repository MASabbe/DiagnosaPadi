<?php
//session_start();
if(! ($_SESSION['id_user']))
{
	echo "<script>window.alert('Untuk mengakses, Anda harus Login Sebagai Members');
        window.location=('../login.html')</script>";
}
?>