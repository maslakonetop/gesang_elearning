<div id="tengah">
<?php
$nomor=1;
foreach ($judul_kategori->result_array() as $row) {
$nama_kategori=$row['nama_kategori'];
}
echo "<span class='judulkategori'>Kategori ".$nama_kategori."</span>";
echo"<div>";
foreach ($query->result() as $row) {
$isi_tutorial = substr($row->isi,0,400);
echo"<table class='widget' style='border: 1pt ridge #DDDDDD;' bgcolor='#FFA500' ><tr><td><h2><a href='".base_url()."index.php/learning/detailtutorial/".$row->id_tutorial."'>".$row->judul_tutorial."</a></h2>
<span>Kategori <b>".$row->nama_kategori."</b> - ".$row->tanggal." -|- ".$row->waktu." WIB</span><p>
<span class=image><img src='".base_url()."system/application/views/e-learning/tutorial/".$row->gambar."' width=75 border=0></span>".$isi_tutorial." <b>
.... <a href='".base_url()."index.php/learning/detailtutorial/".$row->id_tutorial."'>[Baca Selengkapnya]</a></b></td></tr></table><br>";
} ?>
</table>
</div>

<table class="widget" style="border: 1pt ridge #DDDDDD;" align="center" bgcolor="#EEFAFF"><tr><td><?=$paginator;?></td></tr></table>
</div>
