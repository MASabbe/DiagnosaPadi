<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus penyakit
if ($module=='penyakit' AND $act=='hapus'){
  mysql_query("DELETE FROM rb_penyakit WHERE id_penyakit='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input penyakit
elseif ($module=='penyakit' AND $act=='input'){
	$nama_foto = $_FILES["file"]["name"];
	$file_basename = substr($nama_foto, 0, strripos($nama_foto, '.')); // strip extention
	$file_ext = substr($nama_foto, strripos($nama_foto, '.')); // strip name
	$filesize = $_FILES["file"]["size"];
 
    if ($file_ext == ".jpg" || $file_ext == ".png"  &&  $filesize < 100000) {
         move_uploaded_file($_FILES["file"]["tmp_name"], "foto/" . $nama_foto);
     }
	
	
    mysql_query("INSERT INTO rb_penyakit (id_penyakit,
									penyakit,
									latin,
									keterangan,
									solusi,
									foto
									) 
							VALUES('$_POST[kode]',
								   '$_POST[penyakit]',
								   '$_POST[latin]',
								   '$_POST[keterangan]',
								   '$_POST[solusi]',
								   '$nama_foto'
								   )");

  header('location:../../media.php?module='.$module);
}

// Update penyakit
elseif ($module=='penyakit' AND $act=='update'){
	$nama_foto = $_FILES["file"]["name"];
	$file_basename = substr($nama_foto, 0, strripos($nama_foto, '.')); // strip extention
	$file_ext = substr($nama_foto, strripos($nama_foto, '.')); // strip name
	$filesize = $_FILES["file"]["size"];
 
    if ($file_ext == ".jpg" || $file_ext == ".png"  &&  $filesize < 100000) {
         move_uploaded_file($_FILES["file"]["tmp_name"], "foto/" . $nama_foto);
     }
	if ($nama_foto=='') {
		$ft=$_POST['foto_lama'];
	} else {
		$ft=$nama_foto;
	}

    mysql_query("UPDATE rb_penyakit SET id_penyakit = '$_POST[kode]',
									penyakit  = '$_POST[penyakit]',
									latin  = '$_POST[latin]',
									keterangan = '$_POST[keterangan]',
									solusi = '$_POST[solusi]',
									foto = '$ft'
									WHERE id_penyakit = '$_POST[kodee]'");
							 
  header('location:../../media.php?module='.$module);
}
?>
