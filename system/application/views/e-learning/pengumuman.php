<div id="tengah">
<?php
echo "<table><tr><td valign='top' width='55'><img src='".base_url()."system/application/views/e-learning/images/icon-pengumuman.jpg'></td><td class='judulberitabesar' valign='middle'>Pengumuman Terbaru</td></tr></table><br>";
foreach($query->result() as $pengumuman)
{
echo "<span><h2>Pengumuman ".$pengumuman->judul_pengumuman."</h2></span>";
echo "<span class='tanggalberita'><h3>Diposting pada tanggal : ".$pengumuman->tanggal." - oleh <b>".$pengumuman->nama."</b></h3></span>";
echo "<span>".$pengumuman->isi."</span><hr>";
}
?>
<table class="widget" style="border: 1pt ridge #DDDDDD;" align="center" bgcolor="#EEFAFF"><tr><td><?=$paginator;?></td></tr></table>
</div>
