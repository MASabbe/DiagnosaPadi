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
		  	<center><h2>PRINT HASIL KONSULTASI SISTEM PAKAR <br> HAMA TANAMAN</h2></center><hr/>";
		echo"<tr bgcolor=blue style='color: #fff;'><th>LAPORAN KONSULTASI SISTEM PAKAR </th></tr>";
			$tampil=mysql_query("SELECT * FROM rb_analisa_hasil left join rb_penyakit on rb_analisa_hasil.kd_penyakit=rb_penyakit.id_penyakit
																	left join rb_users on rb_analisa_hasil.id_user=rb_users.id_user where rb_penyakit.id_penyakit='$_GET[id]' AND rb_users.id_user='$_GET[idd]'");

    $no = 0;
	while ($r = mysql_fetch_array($tampil)) {

		$penyakit = nl2br($r['penyakit']);
		$keterangan = nl2br($r['keterangan']);
		$solusi = nl2br($r['solusi']);
      echo "<tr bgcolor>
				
                <td>
					<b>Nama :</b> $r[nama_lengkap]<br/>
					<b>Email :</b> $r[email]<br/>
					<b>No Telp :</b> $r[no_telp]<br/>
					<b>Alamat lengkap :</b> $r[alamat_lengkap]<br/><hr>
				<h2>Hama Penyakit yang di Derita : </h2>
				<b>$penyakit </b><br/>
				$keterangan <br/><hr>
				<h2>Solusi dari Hama Penyakit :</h2>
				$solusi</td>
				</tr>";
    $no++;
    }
    echo "</table>
	
	<tr><td><br/><span style='float:right; text-align:center;'> $tgl_cetak <br/>
										$_SESSION[namalengkap]<br/></br></br>
								(.............................................)</span></td></tr>";
?>
</body>