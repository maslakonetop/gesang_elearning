<div id="tengah">

<?php
//Menampilkan Slide Berita Terbaru
/*
$nomor=1;
$no=1;
echo"<span class='judulkategori'>Berita Terbaru</span>";
echo"<div id='slideshow'>";
echo"<div class='slides'><ul>";
foreach($slide_berita->result_array() as $berita)
{
$isi_berita = substr($berita['isi'],0,400);
echo"<li id='slide-$nomor'>
<h2><a href='".base_url()."index.php/learning/detailberita/".$berita['id_berita']."'>".$berita['judul_berita']."</a></h2>
<span>Kategori <b>".$berita['nama_kategori']."</b> - ".$berita['tanggal']." -|- ".$berita['waktu']." WIB</span><p>
<span class=image><img src='".base_url()."system/application/views/e-learning/berita/".$berita['gambar']."' width=75 border=0></span>".$isi_berita." <b>
.... <a href='".base_url()."index.php/learning/detailberita/".$berita['id_berita']."'>[Baca Selengkapnya]</a></b></li>";
$nomor++;
}
echo" </ul></div><ul class='slides-nav'>";
for($no=1;$no<=10;$no++){
echo"<li><a href='#slide-$no'>$no</a></li>";
}
echo"</ul>
</div>";
*/
?>

<?php
//Menampilkan 4 Tutorial Terbaru
echo"<span class='judulkategori'>Tutorial Terbaru</span><div id='kolom-luar-tutorial'>";
foreach($tampil_tutorial->result_array() as $tutorial)
{
$isi_tutorial = substr($tutorial['isi'],0,150);
echo"<div id='kolom-tutorial'>
<table style='border: 1pt ridge #FFA500;' bgcolor='#FFA500' class='widget' width='230' height='200'>
<tr><td bgcolor='#63605F' height='32' valign='top' align='center'><b><a href='".base_url()."index.php/learning/detailtutorial/".$tutorial['id_tutorial']."'><h4>".$tutorial['judul_tutorial']."</h4></b></td></tr>
<tr><td height='10' valign='top'>".$tutorial['tanggal']." -|- ".$tutorial['waktu']." WIB</td></tr>
<tr><td valign='top'><img src='".base_url()."system/application/views/e-learning/tutorial/".$tutorial['gambar']."' width='70' class='image'>".$isi_tutorial."...<i><a href='".base_url()."index.php/learning/detailtutorial/".$tutorial['id_tutorial']."'>[Lanjut]</a></i></td></tr>
<tr><td bgcolor='#63605F' align='center'><b><a href='".base_url()."index.php/learning/detailtutorial/".$tutorial['id_tutorial']."'>[Baca Selengkapnya]</a></b></td></tr>
</table>
</div>";
}
echo"</div>";
?>

<br>
<?php
/*
//Menampilkan 4 Pengumuman baru
echo"<span class='judulkategori'>Pengumuman Terbaru</span>";
foreach($pengumuman->result_array() as $umum)
{
$isi=substr($umum['isi'],0,50);
$ptng_isi=nl2br($isi);
echo"<table style='border: 1pt ridge #DDDDDD;' bgcolor='#EEFAFF' class='widget' width='470' height='60'>
<tr><td><img src='".base_url()."system/application/views/e-learning/images/pict-pengumuman.jpg' class=image><h2>".$umum['judul_pengumuman']."</h2><span class='tanggalberita'><h3>Diposting pada tanggal ".$umum['tanggal']." - oleh <b>".$umum['nama']."</b></h3></span>".$ptng_isi.".... <a href=".base_url()."index.php/learning/detailpengumuman/".$umum['id_pengumuman']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\"><b>[ Lihat ]</b></a></td></tr>
</table><table><tr><td height='2'></td></tr></table>";
}*/
?>
<!--
<table style="border: 1pt ridge #DDDDDD;" width="470" bgcolor="#EEFAFF" cellpadding="5" class="widget">
<tr bgcolor="#CEF0FF"><td colspan="3"><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/pict-index.png" class="image-index"/> <b><a href="<?php echo base_url(); ?>index.php/learning/pengumuman/">Lihat Semua Pengumuman</b></td></tr>
</table>
-->

</div>

