<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/class_paging.php";
include "../config/session_admin.php";


if ($_GET['module']=='home'){
    $edit=mysql_query("SELECT * FROM rb_users WHERE id_user='$_SESSION[id_user]'");
    $r=mysql_fetch_array($edit);
echo "	<form class='form-horizontal' id='registerHere' method='post' action='modul/mod_members/aksi_members.php?module=admin&act=update'>
	  <fieldset>
		<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Data Administrator, Jika Password Tidak Diganti kosongkan saja.
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
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button type='submit' class='btn btn-success' rel='tooltip' title='first tooltip'>Update Data</button>
	       
	      </div>
	
	</div> 
	  </fieldset>
	</form>"; 
}

elseif ($_GET['module']=='about'){
  include "modul/mod_about/about.php";
}

elseif ($_GET['module']=='hpage'){
  include "modul/mod_home/home.php";
}

elseif ($_GET['module']=='donation'){
  include "modul/mod_donation/donation.php";
}

elseif ($_GET['module']=='help'){
  include "modul/mod_help/help.php";
}

elseif ($_GET['module']=='members'){
  include "modul/mod_members/members.php";
}

elseif ($_GET['module']=='contact'){
  include "modul/mod_contact/contact.php";
}

elseif ($_GET['module']=='penyakit'){
  include "modul/mod_penyakit/penyakit.php";
}

elseif ($_GET['module']=='gejala'){
  include "modul/mod_gejala/gejala.php";
}

elseif ($_GET['module']=='hasil'){
  include "modul/mod_hasil/hasil.php";
}

elseif ($_GET['module']=='solusi'){
  include "modul/mod_solusi/solusi.php";
}

elseif ($_GET['module']=='kelebihan'){
  include "modul/mod_kelebihan/kelebihan.php";
}

elseif ($_GET['module']=='kelemahan'){
  include "modul/mod_kelemahan/kelemahan.php";
}

elseif ($_GET['module']=='news'){
  include "modul/mod_news/news.php";
}

else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
