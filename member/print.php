<?php
  session_start();	
?>
<head>
<title>Print Data Konsultasi</title>
<style>
table, td, th
{
border:1px solid #000;
}
th
{
background-color:#e3e3e3;
color:#000;
font-weight: bold;
}
</style>
</head>

<body onload="window.print()">
<?php
	include "../config/koneksi.php";
	include "../config/library.php";
	echo "
		  <table width=100%>
		  	<center><h2>PRINT HASIL KONSULTASI SISTEM PAKAR <br> PADA SISTEM PAKAR TANAMAN</h2></center><hr/>";
		echo"<tr bgcolor=blue style='color: #fff;'><th>LAPORAN KONSULTASI SISTEM PAKAR</th></tr>";
			$tampil=mysql_query("SELECT * FROM rb_penyakit where id_penyakit='$_GET[id]'");
		
		$sql=mysql_query("SELECT * FROM rb_penyakit WHERE id_penyakit='$_GET[id]'");
		$p=mysql_fetch_array($sql);

		$penyakit = nl2br($p['penyakit']);
		$keterangan = nl2br($p['keterangan']);
		$solusi = nl2br($p['solusi']);
		
		$sql=mysql_query("SELECT * FROM rb_users WHERE id_user='$_SESSION[id_user]'");
		$r=mysql_fetch_array($sql);
      echo "<tr bgcolor>
				
                <td>
					<b>Nama :</b> $r[nama_lengkap]<br/>
					<b>Email :</b> $r[email]<br/>
					<b>No Telp :</b> $r[no_telp]<br/>
					<b>Alamat lengkap :</b> $r[alamat_lengkap]<br/><hr>
				<h2>Penyakit yang di Derita : </h2>
				<b>$penyakit </b><br/>
				$keterangan <br/><hr>
				<h2>Solusi dari Penyakit :</h2>
				$solusi</td>
				</tr>";
    echo "</table>
	
	<tr><td><br/><span style='float:right; text-align:center;'>  $tgl_cetak <br/>
										$_SESSION[namalengkap]<br/></br></br>
								(.............................................)</span></td></tr>";
?>
</body>