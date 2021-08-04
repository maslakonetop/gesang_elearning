<div id="tengah">
<?php
$nomor=1;
foreach ($judul_kategori->result_array() as $row) {
$nama_kategori=$row['nama_kategori'];
}
echo "<span class='judulkategori'>Kategori ".$nama_kategori."</span>";
echo"<div>";
foreach ($query->result() as $row) {
$isi_berita = substr($row->isi,0,400);
echo"<table class='widget' style='border: 1pt ridge #FFA500;' bgcolor='#FFA500' ><tr><td><h2><a href='".base_url()."index.php/learning/detailberita/".$row->id_berita."'>".$row->judul_berita."</a></h2>
<span>Kategori <b>".$row->nama_kategori."</b> - ".$row->tanggal." -|- ".$row->waktu." WIB</span><p>
<span class=image><img src='".base_url()."system/application/views/e-learning/berita/".$row->gambar."' width=75 border=0></span>".$isi_berita." <b>
.... <a href='".base_url()."index.php/learning/detailberita/".$row->id_berita."'>[Baca Selengkapnya]</a></b></td></tr></table><br>";
} ?>
</table>
</div>

<table class="widget" style="border: 1pt ridge #DDDDDD;" align="center" bgcolor="#EEFAFF"><tr><td><?=$paginator;?></td></tr></table>
</div>
