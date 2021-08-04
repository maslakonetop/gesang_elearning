<div id="tengah">
<?php
	foreach($detail->result_array() as $rows) {
		$id_berita=$rows['id_berita'];
			echo "<table><tr><td valign='top' width='55'><img src='".base_url()."system/application/views/e-learning/images/det_berita.png'></td><td class='judulberitabesar' valign='middle'>".$rows['judul_berita']."</td></tr></table>";
			echo "Kategori <a href=".base_url()."index.php/learning/katberita/".$rows['id_kategori']."><b>".$rows['nama_kategori']."</a></b> | <span class='tanggalberita'>".$rows['tanggal']." - ".$rows['waktu']." WIB</span> | by <em><strong>Admin</strong></em><br>";
			echo"<span>Share this article on : "; 
?>
<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>&#8226; Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>&#8226; Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Digg</a>");
</script>
<?php
$isian=nl2br($rows['isi']);
echo "<br><p><span><img src='".base_url()."system/application/views/e-learning/berita/".$rows['gambar']."' class='image'></span>".$isian."<br><br>";

echo"<span>Share this article on : ";
?>
<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>&#8226; Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>&#8226; Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Digg</a>");
</script>
<?php
//Menampilkan 5 Berita Acak
echo"<br>Artikel ini dibaca sebanyak<b> ".$rows['counter']." kali</b><br><span class='berita-lain'><img src='".base_url()."system/application/views/e-learning/images/icon-berita.png'>Baca Juga Berita Lainnya</span>";
echo"<ul>";
foreach($acak_berita->result_array() as $acak)
{
echo "<li><a href='".base_url()."index.php/learning/detailberita/".$acak['id_berita']."'>".$acak['judul_berita']."</a></li>";
}
echo"</ul>";
?>
<span class='berita-lain'>Komentar Untuk Berita Ini</span><br>
<table class="widget" style="border: 1pt ridge #DDDDDD;" width=100% cellpadding="0" cellspacing="1" bgcolor="#FF8C00">
<?php
foreach($query->result() as $tampil)
{
if($tampil->id_komen_berita==null){
echo "<tr><td>Komentar Masih Kosong!!!</td></tr>";
}
else{
echo "<tr valign='top' align='left'><td width='10'></td><td width='80'>Nama</td><td width='10'>:</td><td><a href='mailto:".$tampil->email."'>".$tampil->nama."</a></td></tr>
<tr valign='top' align='left'><td width='10'></td><td width='80'>Komentar</td><td>:</td><td>".$tampil->komentar."<br><br></td></tr>";
}
}
?>
<tr><td colspan="4" align="center"><?=$paginator;?></td></tr>
</table><br>

<div>
<span class='berita-lain'>Berikan Komentar Artikel Ini</span>
<?php echo form_open('learning/kirimkomentar'); ?>
<input type="hidden" name="id_berita" value="<?php echo $id_berita; ?>">
<table class="widget" style="border: 1pt ridge #DDDDDD;" bgcolor="#EEFAFF" width="100%">
<tr align="left" valign="top"><td width="100">Nama</td><td>:</td><td><input type="text" name="nama" class="textfield" size="30"></td></tr>
<tr align="left" valign="top"><td width="100">Email</td><td>:</td><td><input type="text" name="email" class="textfield" size="30"></td></tr>
<tr align="left" valign="top"><td width="100">Komentar</td><td>:</td><td><textarea name="komentar" class="textfield" cols="40" rows="4"></textarea></td></tr>
<tr align="left" valign="top"><td width="100"></td><td></td><td><?php echo $cap_img ;?><p><?php echo $cap_msg ;?></p></td></tr>
<tr align="left" valign="top"><td width="100">Captcha</td><td>:</td><td><input type="text" name="captcha" value="" class="textfield"/></td></tr>
<tr align="left" valign="top"><td width="100"></td><td></td><td><input type="reset" class="tombol" value="Hapus"><input type="submit" class="tombol" value="Kirim"></td></tr>
</table>
</form>
<?php
}
?>
</div>
</div>
