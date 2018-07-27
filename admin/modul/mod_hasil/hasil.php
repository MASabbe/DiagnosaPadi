<?php
  $aksi="modul/mod_hasil/aksi_hasil.php";
switch(isset($_GET['act'])){

  default:
  echo "<table class='table table-hover' width=100%>
          <tr style='background:#e3e3e3; border:1px solid #cecece;'><th>No</th><th>Nama Lengkap</th><th>Umur</th><th>Waktu Konsultasi</th><th style='width:90px; text-align:center;'>Action</th></tr>";
    $p      = new Paging;
    $batas  = 5;
    $posisi = $p->cariPosisi($batas);
      $tampil = mysql_query("SELECT * FROM rb_analisa_hasil left join rb_users on rb_analisa_hasil.id_user=rb_users.id_user order by id_hasil DESC");
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){

      echo "<tr bgcolor=><td>$no</td>
				<td>$r[nama_lengkap]</td>
                <td>$r[umur] Tahun</td>
				<td>$r[waktu]</td>
				<td><center>
					<a class='btn btn-info' title='View Hasil' href=?module=hasil&act=detailhasil&id=$r[id_hasil]><i class='icon-search icon-white'></i></a>
					<a class='btn btn-danger' title='Delete Hasil' href=$aksi?module=hasil&act=hapus&id=$r[id_hasil]><i class='icon-trash icon-white'></i></a></center>
				</td></tr>";
      $no++;
    }

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM rb_analisa_hasil"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

   		echo "</table><br/><hr>";
		echo "</li></ul>
			  <div style='float:left; margin-top:-20px;' class='pagination'>
			  <ul>
				$linkHalaman
			</ul>
		</div>";
    break;
    
  case "detailhasil":
	$detail=mysql_query("SELECT * FROM rb_analisa_hasil
							LEFT OUTER JOIN rb_penyakit ON
									rb_analisa_hasil.kd_penyakit=rb_penyakit.id_penyakit
							LEFT OUTER JOIN rb_users ON
									rb_analisa_hasil.id_user=rb_users.id_user where id_hasil='$_GET[id]'");
	
	$d   = mysql_fetch_array($detail);
	$penyakit = nl2br($d['penyakit']);
	$solusi = nl2br($d['solusi']);
	$keterangan = nl2br($d['keterangan']);
	echo "<span class='title'>Detail Hasil Analisa Penyakit : $d[nama_lengkap]</span><hr>";
	
					echo "<table width='100%' style='border:none;' cellpadding='2' cellspacing='1'>
					<tr><td width='142' style='color:#000; font-weight:bold; font-size:12px'>Nama Lengkap</td>
						<td width='689' style='font-size:12px'>: $d[nama_lengkap]</td></tr>
					<tr><td style='color:#000; font-weight:bold; font-size:12px'>Alamat Email</td>
						<td style='font-size:12px'>: $d[email]</td></tr>
					<tr><td style='color:#000; font-weight:bold; font-size:12px'>No Telepon</td>
						<td style='font-size:12px'>: $d[no_telp]</td></tr>
					<tr><td style='color:#000; font-weight:bold; font-size:12px'>Alamat Lengkap</td>
						<td style='font-size:12px'>: $d[alamat_lengkap]<br/></td></tr>
					<tr><td style='color:#000; font-weight:bold; font-size:12px'>Waktu Analisa</td>
						<td style='font-size:12px'>: $d[waktu]WIB<br/></td></tr>
					<tr><td style='color:#000; font-weight:bold; font-size:12px'>Umur Members</td>
						<td style='font-size:12px'>: $d[umur] Tahun<br/></td></tr>
					<tr><td style='color:#000; font-weight:bold; font-size:12px'>Alamat Lengkap</td>
						<td style='font-size:12px'>: $d[alamat_lengkap]<br/></td></tr>
				</table><br/>";
				
echo "<span class='title'>Penyakit yang di Derita : </span><hr>
				
				<span style='color:#000; font-weight:bold;'>".$penyakit."</span>
				<p>".$keterangan."</p><br/>	
				<span class='title'>Solusi dari Penyakit :</span><hr> <p>".$solusi."</p>
				"; ?>
					<img src="modul/mod_penyakit/foto/<?php echo $d['foto']; ?>" width="240" height="240"/>      
				<?php
				echo "
				<center><br/><a class='btn btn-success' target='_BLANK' href='print.php?id=$d[id_penyakit]&idd=$d[id_user]'>Print Hasil Konsultasi</a></center>";
    break;  
}

?>