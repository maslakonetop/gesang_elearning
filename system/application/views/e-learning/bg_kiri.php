<div id="isi">
<div id="kiri">
<div id="sidebar">
		<?php
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
			if($session!=""){
				$pecah=explode("|",$session);
					$status = $data["status"] = $pecah[3];
			if($status=="Mahasiswa"){
		?>
	<table style="border: 1pt ridge #FF8C00;" bgcolor="#FF8C00" class="widget" width="230">
		<tr bgcolor="#FFA072"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/login-icon.png" /> Selamat Datang</h2></td></tr>
			<tr><td align="center" colspan="3">Hai, <b><?php echo $nama; ?></b></td></tr>
				<tr><td width="5"></td><td><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/user-icon.jpg" class="image"/><td width="175">
					<a href="<? echo base_url(); ?>index.php/learning/passwordmhs" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><div class="menu-user">Ganti Password</div></a>
					<a href="<? echo base_url(); ?>index.php/learning/pesanadmin" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><div class="menu-user">Kirim Pesan ke Admin</div></a>
					<a href="<? echo base_url(); ?>index.php/learning/pesandosen" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><div class="menu-user">Kirim Pesan ke Dosen</div></a>
					</td></tr>
				<tr><td colspan="3" height="10"><a href="<? echo base_url(); ?>index.php/learning/inboxmhs" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><div class="menu-user-bawah">Inbox Pesan</div></a>
			<a href="<? echo base_url(); ?>index.php/learning/logout"><div class="menu-user-bawah">Keluar / Log Out</div></a>
		</td></tr>
	</table><br />
		<?php
			}
			else if($status=="admin"){
		?>
	<table style="border: 1pt ridge #FF8C00;" bgcolor="#FF8C00" class="widget" width="230">
		<tr bgcolor="#FFA072"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/login-icon.png" /> Selamat Datang</h2></td></tr>
			<tr><td align="center" colspan="3">Hai, <b><?php echo $nama; ?></b></td></tr>
				<tr><td width="5"></td><td><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/user-icon.jpg" class="image"/><td width="175">
				<a href="<? echo base_url(); ?>index.php/admin"><div class="menu-user">Masuk ke Panel Admin</div></a>
				<a href="<? echo base_url(); ?>index.php/learning/passwordmhs" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><div class="menu-user">Ganti Password</div></a>
				<a href="<? echo base_url(); ?>index.php/learning/logout"><div class="menu-user">Keluar / Log Out</div></a>
			</td></tr>
		<tr><td colspan="3" height="10"></td></tr>
	</table><br />
		<?php
			}
			else if($status=="PA"){
		?>
		
<table style="border: 1pt ridge #FF8C00;" bgcolor="#FF8C00" class="widget" width="230">
	<tr bgcolor="#FFA072"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/login-icon.png" /> Selamat Datang</h2></td></tr>
		<tr><td align="center" colspan="3">Hai, <b><?php echo $nama; ?></b></td></tr>
			<tr><td width="5"></td><td><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/user-icon.jpg" class="image"/><td width="175">
				<a href="<? echo base_url(); ?>index.php/dosen"><div class="menu-user">Masuk ke Panel Dosen</div></a>
				<a href="<? echo base_url(); ?>index.php/learning/passwordmhs" onclick="return hs.htmlExpand(this, { objectType: 'iframe' } )"><div class="menu-user">Ganti Password</div></a>
				<a href="<? echo base_url(); ?>index.php/learning/logout"><div class="menu-user">Keluar / Log Out</div></a>
			</td></tr>
	<tr><td colspan="3" height="10"></td></tr>
</table><br />
		<?php
			}
				}
				else {
		?>
		
<form method="post" action="<?php echo "".base_url()."index.php/learning/login" ?>">
	<table style="border: 1pt ridge #FF8C00;" bgcolor="#FF8C00" class="widget" width="230">
		<tr bgcolor="#63605F"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/login-icon.png" /> Login Pengguna</h2></td></tr>
			<tr><td width="70">Username</td><td width="5">:</td><td width="130"><input name="usernameteks" type="text" class="textfield" size="16"/></td></tr>
			<tr><td width="70">Password</td><td width="5">:</td><td width="130"><input name="passwordteks" type="password" class="textfield" size="16"/></td></tr>
			<tr><td width="70"></td><td width="5"></td><td width="135"><input type="reset" value="Hapus" class="tombol"/> <input type="submit" value="Log In" class="tombol"/><br><br></td></tr>
	</table>
</form>
<?php
}
?>

<!-- MODIFIKASI
<form id="myForm" method="post" action="<?php echo base_url(); ?>index.php/learning/kirimshoutbox">
<table style="border: 1pt ridge #DDDDDD;" bgcolor="#EEFAFF" class="widget" width="230">
<tr bgcolor="#CEF0FF"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/komentar-icon.png" /> Komentar Anda</h2></td></tr>
<tr><td height="1" colspan="3" valign="top"><div id="shoutboxdata">
<iframe title="stikombanyuwangi" src="http://www4.shoutmix.com/?stikombanyuwangi" width="220" height="350" frameborder="0" scrolling="auto">
</iframe>
</div>
</table>
</form>
<table style="border: 1pt ridge #DDDDDD;" width="230" bgcolor="#EEFAFF" cellpadding="5" class="widget">
<tr bgcolor="#CEF0FF"><td><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/berita-top-icon.png" /> Berita Terpopuler</h2></td></tr>
<tr><td>
<ul>

<?php
foreach($berita_populer->result_array() as $pop)
{
echo "<li class='li-class'><a href=".base_url()."index.php/learning/detailberita/".$pop['id_berita'].">".$pop['judul_berita']." <b>[".$pop['counter']."]</b></a></li>";
}
?>
</ul>
</td></tr>
</table>
<br />
<table style="border: 1pt ridge #DDDDDD;" width="230" bgcolor="#EEFAFF" cellpadding="5" class="widget">
<tr bgcolor="#CEF0FF"><td><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/link-terkait-icon.png" /> Link Terkait</h2></td></tr>
<tr><td>
<ul>
<li class="li-class"><a href="#">Sistem Informasi Online</a></li>
<li class="li-class"><a href="#">Index Prestasi Dosen (IPD)</a></li>
<li class="li-class"><a href="#">Kartu Rencana Studi (KRS) Online</a></li>
<li class="li-class"><a href="#">STIKOM PGRI Banyuwangi</a></li>
<li class="li-class"><a href="#">Badan Eksekutif Mahasiswa</a></li>
<li class="li-class"><a href="#">UKM Kloso</a></li>
<li class="li-class"><a href="#">UKM Kamera</a></li>
</ul>
-->
</td></tr>
</table>
</div>
</div>
