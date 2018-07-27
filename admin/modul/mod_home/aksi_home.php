<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='home' AND $act=='update'){
    mysql_query("UPDATE rb_halaman SET detail = '$_POST[isi]',
                                  judul         = '$_POST[judul]'    
                            WHERE halaman       = '$_POST[id]'");
  header('location:../../media.php?module=hpage');
}
?>
