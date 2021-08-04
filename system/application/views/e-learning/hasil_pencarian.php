<div id="tengah">
<?php
echo "<table><tr><td valign='top' width='55'><img src='".base_url()."system/application/views/e-learning/images/hasil-cari.png'></td><td class='judulberitabesar' valign='middle'>Hasil Pencarian</td></tr></table>";
if($kata==null)
{
echo "Kolom keyword masih kosong!!!!!";
}
else
{
if($jumlah==null){
echo "Pencarian dengan keyword <b>".$kata."</b>, tidak ditemukan!!!!</b>";
}
else{
echo "Ditemukan <b>".$jumlah."</b> hasil pencarian dengan keyword <b>".$kata."</b><br><br>";
foreach($hasil->result_array() as $cari)
{
	if($pilihan=='tblberita'){
	$isi_berita = substr($cari['isi'],0,300);
	echo"<table class='widget' style='border: 1pt ridge #DDDDDD;' bgcolor='#EEFAFF' ><tr><td><h2><a href='".base_url()."index.php/learning/detailberita/".$cari['id_berita']."'>".$cari['judul_berita']."</a></h2>
<span>".$cari['tanggal']." -|- ".$cari['waktu']." WIB</span><p>
<span class=image><img src='".base_url()."system/application/views/e-learning/berita/".$cari['gambar']."' width=40 border=0></span>".$isi_berita." <b>
.... <a href='".base_url()."index.php/learning/detailberita/".$cari['id_berita']."'>[Baca Selengkapnya]</a></b></td></tr></table><br>";
	}
	else if($pilihan=='tblpengumuman'){
$isi=substr($cari['isi'],0,50);
$ptng_isi=nl2br($isi);
echo"<table style='border: 1pt ridge #DDDDDD;' bgcolor='#EEFAFF' class='widget' width='470' height='60'>
<tr><td><img src='".base_url()."system/application/views/e-learning/images/pict-pengumuman.jpg' class=image><h2>".$cari['judul_pengumuman']."</h2><span class='tanggalberita'><h3>Diposting pada tanggal ".$cari['tanggal']." - oleh <b>".$cari['penulis']."</b></h3></span>".$ptng_isi.".... <a href=".base_url()."index.php/learning/detailpengumuman/".$cari['id_pengumuman']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\"><b>[ Lihat ]</b></a></td></tr>
</table><table><tr><td height='2'></td></tr></table>";
	}
	else if($pilihan=='tblagenda'){
		$deskripsi = substr($cari['isi'],0,80);
		echo "<a href=".base_url()."index.php/learning/detailagenda/".$cari['id_agenda']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\"><h6>".$cari['tema_agenda']."</h6></a>";
		echo "<span>".$deskripsi."....</span>";
		echo "<hr>";
	}
	else{
$isi_tutorial = substr($cari['isi'],0,300);
echo"<table class='widget' style='border: 1pt ridge #DDDDDD;' bgcolor='#EEFAFF' ><tr><td><h2><a href='".base_url()."index.php/learning/detailtutorial/".$cari['id_tutorial']."'>".$cari['judul_tutorial']."</a></h2>
<span>".$cari['tanggal']." -|- ".$cari['waktu']." WIB</span><p>
<span class=image><img src='".base_url()."system/application/views/e-learning/tutorial/".$cari['gambar']."' width=75 border=0></span>".$isi_tutorial." <b>
.... <a href='".base_url()."index.php/learning/detailtutorial/".$cari['id_tutorial']."'>[Baca Selengkapnya]</a></b></td></tr></table><br>";
	}
}
}
}
?>
</div>
