<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus Gejala
if ($module=='gejala' AND $act=='hapus'){
  mysql_query("DELETE FROM rb_gejala WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input Gejala
elseif ($module=='gejala' AND $act=='input'){

    mysql_query("INSERT INTO rb_gejala (id,
								   pertanyaan,
								   ifyes,
								   ifno) 
							VALUES('$_POST[kode]',
								   '$_POST[pertanyaan]',
								   '$_POST[ifyes]',
								   '$_POST[ifno]')");
  header('location:../../media.php?module='.$module);
}

// Update Gejala
elseif ($module=='gejala' AND $act=='update'){
    mysql_query("UPDATE rb_gejala SET id = '$_POST[kode]',
                                 pertanyaan = '$_POST[pertanyaan]',
								 ifyes = '$_POST[ifyes]',
								 ifno = '$_POST[ifno]'
                             WHERE id = '$_POST[kodee]'");
							 
  header('location:../../media.php?module='.$module);
}
?>
