<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='members' AND $act=='hapus'){
  mysql_query("DELETE FROM rb_users WHERE id_user='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='members' AND $act=='update'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE rb_users SET nama_lengkap = '$_POST[nama_lengkap]',
                                  email           = '$_POST[email]',
                                  no_telp         = '$_POST[no_telp]', 
								  alamat_lengkap  = '$_POST[alamat_lengkap]',
								  umur      	  = '$_POST[umur]',
								  jenis_kelamin   = '$_POST[gender]'
                             WHERE id_user  	  = '$_POST[id]'");
  }
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE rb_users SET password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',  
                                 no_telp         = '$_POST[no_telp]',  
								 alamat_lengkap  = '$_POST[alamat_lengkap]',
								 umur      	 	 = '$_POST[umur]',
								 jenis_kelamin   = '$_POST[gender]'
                             WHERE id_user   = '$_POST[id]'");
 }
  header('location:../../media.php?module='.$module);
}


elseif ($module=='admin' AND $act=='update'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE rb_users SET nama_lengkap = '$_POST[nama_lengkap]',
                                  email           = '$_POST[email]',
                                  no_telp         = '$_POST[no_telp]'
                             WHERE id_user  	  = '$_POST[id]'");
  }
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE rb_users SET password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',  
                                 no_telp         = '$_POST[no_telp]'
                             WHERE id_user   = '$_POST[id]'");
 }
  header('location:../../media.php?module=home');
}
?>
