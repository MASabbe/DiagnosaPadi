<?php
include "kodeauto.php";
$aksi="modul/mod_gejala/aksi_gejala.php";
if (isset($_GET['act'])) {
	$act=$_GET['act'];
} else {
	$act='';
}

if ($act=='') {

    echo "
          <input class='btn btn-primary' type=button value='Tambah Gejala' onclick=\"window.location.href='?module=gejala&act=tambahgejala';\"><hr>
          <table class='table table-hover' width=100%>
          <tr style='background:#e3e3e3; border:1px solid #cecece;'><th>Id</th><th>Gejala</th><th style='width:60px;'>If Yes</th><th style='width:60px;'>If No</th><th style='width:90px; text-align:center;'>Action</th></tr>";
    $p      = new Paging;
    $batas  = 5;
    $posisi = $p->cariPosisi($batas);
      $tampil = mysql_query("SELECT * FROM rb_gejala ORDER BY id ASC LIMIT $posisi,$batas");
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){

      echo "<tr bgcolor=>
				<td>$r[id]</td>
				<td>$r[pertanyaan]</td>
                <td>$r[ifyes]</td>
                <td>$r[ifno]</td>
		        <td><center>
					<a class='btn btn-info' title='View Gejala' href=?module=gejala&act=editgejala&id=$r[id]><i class='icon-search icon-white'></i></a>
					<a class='btn btn-danger' title='Delete Gejala' href=$aksi?module=gejala&act=hapus&id=$r[id]><i class='icon-trash icon-white'></i></a></center>
				</td></tr>";
      $no++;
    }

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM rb_gejala"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

		echo "</table><br/><hr>";
		echo "</li></ul>
			  <div style='float:left; margin-top:-20px;' class='pagination'>
			  <ul>
				$linkHalaman
			</ul>
		</div>";
 
 }elseif($_GET['act']=="tambahgejala"){
 	
    echo "<span class='title'>Tambah Daftar Relasi atau Pertanyaan</span><hr><br/>
	<form class='form-horizontal' id='registerHere' method='post' action='$aksi?module=gejala&act=input'>
	  <fieldset>
			<div class='control-group'>
				<label class='control-label' for='input01'>Id Gejala</label>
				  <div class='controls'>
					<input type='text' class='input-xlarge' name='kode'>       
				  </div>
			</div>
			
			<div class='control-group'>
				<label class='control-label' for='input01'>Relasi (If Yes)</label>
				  <div class='controls'>
					<input type='text' class='input-xlarge' name='ifyes'>    
				  </div>
			</div>
			
			<div class='control-group'>
				  <label class='control-label' for='input01'>Relasi (If No)</label>
				  <div class='controls'>
					<input type='text' class='input-xlarge' name='ifno'>      
				  </div>
			</div>
			
			<div class='control-group'>
				<label class='control-label' for='input01'>Pertanyaan/Gejala</label>
				  <div class='controls'>
					<textarea style='width:96%; height:80px;' name='pertanyaan'>Apakah</textarea>  
				  </div>
			</div>
			
			<div class='control-group'>
				<label class='control-label' for='input01'></label>
				  <div class='controls'>
				   <button type='submit' class='btn btn-success' rel='tooltip' title='first tooltip'>Tambah</button>
				   <input class='btn' type=button value=Batal onclick=self.history.back()>
				  </div>
			</div> 
	  </fieldset>
	</form>";      	

} else {
  $edit = mysql_query("SELECT * FROM rb_gejala WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<span class='title'>View and Edit Detail Gejala.</span><hr><br/>
	<form class='form-horizontal' id='registerHere' method='post' action='$aksi?module=gejala&act=update'>
	  <fieldset>
			<div class='control-group'>
				<label class='control-label' for='input01'>Id Gejala</label>
				  <div class='controls'>
					<input type=hidden name='kodee' value='$r[id]'>
					<input type='text' class='input-xlarge' name='kode' value='$r[id]'>       
				  </div>
			</div>
			
			<div class='control-group'>
				<label class='control-label' for='input01'>Relasi (If Yes)</label>
				  <div class='controls'>
					<input type='text' class='input-xlarge' name='ifyes' value='$r[ifyes]'>    
				  </div>
			</div>
			
			<div class='control-group'>
				  <label class='control-label' for='input01'>Relasi (If No)</label>
				  <div class='controls'>
					<input type='text' class='input-xlarge' name='ifno' value='$r[ifno]'>      
				  </div>
			</div>
			
			<div class='control-group'>
				<label class='control-label' for='input01'>Pertanyaan/Gejala</label>
				  <div class='controls'>
					<textarea style='width:96%; height:80px;' name='pertanyaan'>$r[pertanyaan]</textarea>  
				  </div>
			</div>
			
			<div class='control-group'>
				<label class='control-label' for='input01'></label>
				  <div class='controls'>
				   <button type='submit' class='btn btn-success' rel='tooltip' title='first tooltip'>Update</button>
				   <input class='btn' type=button value=Batal onclick=self.history.back()>
				  </div>
			</div> 
	  </fieldset>
	</form>"; 	
  
}
?>
