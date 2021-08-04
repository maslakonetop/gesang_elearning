<div id="kanan">
<a href="<?php echo base_url(); ?>index.php/tes"><div class="bg-menu">Beranda<br /><h3><i>Kembali ke menu utama</i></h3></div></a>
<a href="<?php echo base_url(); ?>index.php/tes/katalogsoal"><div class="bg-menu">Katalog Soal<br /><h3><i>Lihat kumpulan soal-soal</i></h3></div></a>
<a href="<?php echo base_url(); ?>index.php/tes/lihatnilai"><div class="bg-menu">Nilai<br /><h3><i>Lihat nilai-nilai hasil tes soal</i></h3></div></a>
<a href="<?php echo base_url(); ?>index.php/learning"><div class="bg-menu">E-Learning<br /><h3><i>Kembali ke situs e-learning</i></h3></div></a>
<?php
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
?>
<a href="<?php echo base_url(); ?>index.php/learning/logout"><div class="bg-menu">Log Out<br /><h3><i>Keluar dan akhiri tes soal</i></h3></div></a>
<?php
		} else{
?>
<span><h4>Form Login</h4></span>
<form method="post" action="<?php echo "".base_url()."index.php/learning/login" ?>">
<div class="bg-menu"><input type="text" class="textfield" size="20" name="usernameteks"/><br /><h3><i>Masukkan Username</i></h3></div>
<div class="bg-menu"><input type="password" class="textfield" size="20" name="passwordteks"/><br /><h3><i>Masukkan Password</i></h3></div>
<input type="submit" value="Login" class="tombol"/> <input type="reset" value="Hapus" class="tombol"/>
</form>
<?php
		}
?>
<div id="kanan-bawah"><img src="<?php echo base_url(); ?>system/application/views/tes/images/bg-kanan-bawah.png" /></div>
</div>
</div>