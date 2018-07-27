<?php
  $aksi="modul/mod_members/aksi_members.php";
switch(isset($_GET['act'])){

  default:
	    echo "<table class='table table-hover' width=100%>
		 <span class='title'>Manage Data Members.</span><hr>
          <tr style='background:#e3e3e3; border:1px solid #cecece;'><th>No</th><th>Nama Lengkap</th><th>No.Telepone</th><th>Umur</th><th style='width:90px; text-align:center;'>Action</th></tr>"; 
    $p      = new Paging;
    $batas  = 5;
    $posisi = $p->cariPosisi($batas);
	$tampil = mysql_query("SELECT * FROM rb_users where level='member' ORDER BY id_user DESC LIMIT $posisi, $batas");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr bgcolor=><td>$no</td>
             <td>$r[nama_lengkap]</td>
		         <td>$r[no_telp]</td>
				 <td>$r[umur]</td>
             <td><a class='btn btn-info' title='Detail Members' href=?module=members&act=editmembers&id=$r[id_user]><i class='icon-search icon-white'></i></a>
				 <a class='btn btn-danger' title='Delete Members' href=$aksi?module=members&act=hapus&id=$r[id_user]><i class='icon-trash icon-white'></i></a></center></td></tr>";
      $no++;
    }
	$jmldata=mysql_num_rows(mysql_query("SELECT * FROM rb_users"));
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
  
    case "editmembers":
    $edit=mysql_query("SELECT * FROM rb_users WHERE id_user='$_GET[id]'");
    $r=mysql_fetch_array($edit);
echo "	<form class='form-horizontal' id='registerHere' method='post' action='$aksi?module=members&act=update'>
	  <fieldset>
	    <span class='title'>Form Edit and view data Members.</span><hr><br />
		<div class='alert alert-info'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Jika Password Tidak Diganti, Kosongkan saja.
		</div><br/>
	<input type='hidden' name='id' value='$r[id_user]'>  
	<div class='control-group'>
		<label class='control-label' for='input01'>Alamat Email</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' id='email' name='email' value='$r[email]' rel='popover'>       
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Password</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='password' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
	      <label class='control-label' for='input01'>Nama Lengkap</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' id='nama_lengkap' name='nama_lengkap' value='$r[nama_lengkap]'>      
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>No Telepon</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' id='no_telp' name='no_telp' value='$r[no_telp]' rel='popover'>    
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Umur</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' name='umur' value='$r[umur]' class='required'>    
	      </div>
	</div>
	
	 <div class='control-group'>
		<label class='control-label' for='input01'>Gender</label>
	      <div class='controls'>
	        <select name='gender' id='gender' >
            				<option value='$r[jenis_kelamin]'>$r[jenis_kelamin]</option>
			                <option value='Laki-laki'>Laki-laki</option>
			                <option value='Perempuan'>Perempuan</option>
			<option value='other'>Other</option>
			               
			              </select>     
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>Alamat Lengkap</label>
	      <div class='controls'>
	        <textarea style='width:96%; height:80px;' name='alamat_lengkap' class='required'>$r[alamat_lengkap]</textarea>  
	      </div>
	</div>
	
	
	<div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button type='submit' class='btn btn-success' rel='tooltip' title='first tooltip'>Update Data</button>
	       
	      </div>
	
	</div> 
	  </fieldset>
	</form>";      
    break;  
}

?>