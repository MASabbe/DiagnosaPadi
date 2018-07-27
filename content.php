<?php
$server = "localhost";
$username = "root";
$password = "root";
$database = "pakar";

$con=mysqli_connect($server,$username,$password,$database);

if (isset($_GET['module'])) {
	$module=$_GET['module'];
} else {
	$module='';
}
if ($module==''){
  $sql=mysqli_query($con,"SELECT * FROM rb_halaman WHERE halaman='home'");
   
   if(mysqli_connect_errno()){
   echo "<span class='title'>Failed to connect to MySQL: ". mysqli_connect_error();
   }
          
}

elseif ($module=='about'){
   $sql=mysqli_query($con,"SELECT * FROM rb_halaman WHERE halaman='about'");
 
   if(mysqli_connect_errno()){
   echo "<span class='title'>Failed to connect to MySQL: ". mysqli_connect_error();
   }
}


elseif ($module=='help'){
   $sql=mysqli_query($con,"SELECT * FROM rb_halaman WHERE halaman='help'");
  
   if(mysqli_connect_errno()){
   echo "<span class='title'>Failed to connect to MySQL: ". mysqli_connect_error();
   }
}



elseif ($module=='register'){
echo "	<form class='form-horizontal' id='registerHere' method='post' action='index.php?module=aksiregister'>
	  <fieldset>
	    <span class='title'>Form Registrasi Members.</span><hr><br />
		<div class='alert alert-info'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Silahkan Mengisi Data pada Form di bawah ini dengan baik dan benar.
		</div><br/>
	    <div class='control-group'>
	      <label class='control-label' for='input01'>Nama Lengkap</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' id='nama_lengkap' name='nama_lengkap'>      
	      </div>
	</div>
	
	 <div class='control-group'>
		<label class='control-label' for='input01'>Alamat Email</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' id='email' name='email' rel='popover'> <br /> <span id='error1'></span>            
	      </div>
	</div>
	
	<div class='control-group'>
		<label class='control-label' for='input01'>No Telepon</label>
	      <div class='controls'>
	        <input type='text' class='input-xlarge' id='no_telp' name='no_telp' rel='popover'>    
	      </div>
	</div>
	
	 <div class='control-group'>
		<label class='control-label' for='input01'>Gender</label>
	      <div class='controls'>
	        <select name='gender' id='gender' >
            				<option value=''>Gender</option>
			                <option value='Laki-laki'>Laki-laki</option>
			                <option value='Perempuan'>Perempuan</option>
			<option value='other'>Other</option>
			               
			              </select>     
	      </div>
	</div>
	
	
	<div class='control-group'>
		<label class='control-label' for='input01'></label>
	      <div class='controls'>
	       <button type='submit' class='btn btn-success' rel='tooltip' title='first tooltip'>Create My Account</button>
	       
	      </div>
	
	</div> 
	  </fieldset>
	</form>";
}

elseif ($module=='aksiregister'){
	$nama_lengkap=trim(htmlentities($_POST['nama_lengkap']));
	$email=trim(htmlentities($_POST['email']));
	$no_telp=trim(htmlentities($_POST['no_telp']));
	$gender=trim(htmlentities($_POST['gender']));
  $sql=mysqli_query($con,"SELECT * FROM rb_users WHERE email='$email'");
  
  if(mysqli_connect_errno()){
   echo "<span class='title'>Failed to connect to MySQL: ". mysqli_connect_error();
   }
  if ($email==$r['email']){
  echo "<script>window.alert('Alamat Email Sudah Terdaftar, Coba Alamat Email lain..');
				window.location='javascript:history.go(-1)'</script>";
  }else{

function acakangkahuruf($panjang) 
	{ 
		$karakter= 'ABCDEFGHIJKLMNOPQRSabcdefghijklmnopqrs123456789!@#$%^&*0^()'; 
		$string = ''; 
		for ($i = 0; $i < $panjang; $i++) { 
		$pos = rand(0, strlen($karakter)-1); 
		$string .= $karakter{$pos}; 
		} 
		return $string; 
	}
	
	$password=acakangkahuruf(10);
	$pass=md5($email);
    $sql = mysqli_query($con,"INSERT INTO rb_users(email,
								 password,
								 nama_lengkap,
                                 no_telp,
								 jenis_kelamin) 
	                       VALUES('$email',
								'$pass',
								'$nama_lengkap',
                                '$no_telp',
								'$gender')");
								


  echo "<center><div style='margin-top:5%; text-align:center;' class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<b>$nama_lengkap</b>, Success Terdaftar Sebagai Members..
		</div>
		
		</center>";
}
}

elseif ($module=='form_login'){
	echo "<span class='title'>Silahkan Login.</span><hr><br />
		<div class='alert alert-info'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<b>Hello Guest!</b> Untuk melakukan konsultasi pakar, Masukkan Email dan password yang telah anda dapatkan pada waktu register. Anda belum punya account, Daftar <a href='register.html'>Disini</a>
		</div>
		<form method=POST name='formku' onSubmit='return valid()' action='cek_login.php' id='registerHere'>
			<div style='position:relative; left:50%; margin-left:-120px; margin-top:10%;' class='container-fluid'>
				<div class='row-fluid'>
					<div class='span12'>
						<form>
							<fieldset>
								<div class='control-group'>
									 <label>Email :</label>
									 <input type=text name='id_user' class='required'>
								</div>
									 <input type=hidden name=level value='Member'>
								<div class='control-group'>
									 <label>Password :</label>
									 <input type=password name='password' class='required'>
								</div>
										 <button type='submit' class='btn btn-primary'>Login</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			
		</form>";
}

elseif ($module=='hubungikami'){	
  echo "<span class='title'>Hubungi pakar kami secara online (Private)</span><hr><br/></br/>
		<form action=hubungi-aksi.html name='formku' onSubmit='return valid()' method=POST id='registerHere'>
			<fieldset>
				<div class='control-group'>
				<label>Nama Lengkap</label>
					<input id='nama_lengkap' name='nama_lengkap' type='text' style='width:45%;'/> 
				</div>
				<div class='control-group'>
						<label>Alamat E-mail</label>
					<input name='email' type='text' style='width:45%;' id='email'/> 
				</div>
				<div class='control-group'>
					<input name='subjek' type='hidden' value='From_Guest'/> 
						<label>Message</label>
					<textarea style='width:93%; height:120px;' name='pesan' class='required'></textarea>
				</div>										
					<span class='help-block'></span> 
					<button type='submit' class='btn btn-primary'>Submit</button>
			</fieldset>
		</form>";
}

elseif ($module=='hubungiaksi'){
$nama_lengkap = trim(htmlentities($_POST[nama_lengkap]));
$email = trim(htmlentities($_POST[email]));
$subjek = trim(htmlentities($_POST[subjek]));
$pesan = trim(htmlentities($_POST[pesan]));
  mysqli_query($con,"INSERT INTO rb_hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$nama_lengkap',
                               '$email',
                               '$subjek',
                               '$pesan',
                               '$tgl_sekarang')");
							   
  echo "<div style='margin-top:5%; text-align:center;' class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Sukses Mengirim Pesan ke Pakar! <br>Terimakasih telah menghubungi kami. Kami akan segera meresponnya
		</div>";
}

elseif ($module=='semuaberita'){
	  $p      = new Paging2;
	  $batas  = 3;
	  $posisi = $p->cariPosisi($batas);
	  $sql=mysqli_query($con,"select * from rb_berita order by id_berita DESC LIMIT $posisi,$batas");
	  while($r=mysqli_fetch_array($sql)){
		  $tgl = tgl_indo($r[tanggal]);
		  $isi_berita = nl2br($r[isi_berita]);
		  $isi = substr($isi_berita,0, 260);
		  $isi = substr($isi_berita,0,strrpos($isi," "));
		  
		  $jmldata     = mysql_num_rows(mysqli_query("SELECT * FROM rb_berita"));
		  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		  $linkHalaman = $p->navHalaman($_GET[halberita], $jmlhalaman);
			echo "<table><tr>
						<span class='sidebar-title'><a href=news-$r[id_berita].html>$r[judul]</a></span>
						 <div class='date'>Diposting pada : $r[hari], $tgl - $r[jam] WIB  </div><hr>";	 
			echo "<p>$isi [...]</p>";
		 }
			echo "</table><br/><hr>";
			echo "</li></ul>
			  <div style='float:left; margin-top:-20px;' class='pagination'>
			  <ul>
				$linkHalaman
			</ul>
		</div>";
}

elseif ($module=='detailberita'){
	  $sql=mysqli_query($con,"select * from rb_berita where id_berita=$_GET[id]");
	  while($r=mysqli_fetch_array($sql)){
		  $tgl = tgl_indo($r[tanggal]);
		  $isi_berita = nl2br($r[isi_berita]);
	
			echo "<table><tr>
						<span class='sidebar-title'><a href=news-$r[id_berita].html>$r[judul]</a></span>
						 <div class='date'>Diposting pada : $r[hari], $tgl - $r[jam] WIB  </div><hr>";	 
			echo "<p>$isi_berita</p>";
		 }
			echo "</table><br/>";
}
?>				