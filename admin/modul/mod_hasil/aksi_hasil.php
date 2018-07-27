<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='hasil' AND $act=='hapus'){
  mysql_query("DELETE FROM rb_analisa_hasil WHERE id_hasil='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

?>
