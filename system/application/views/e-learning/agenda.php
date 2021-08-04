<div id="tengah">
<?php
echo "<table><tr><td valign='top' width='55'><img src='".base_url()."system/application/views/e-learning/images/agenda-pict.png'></td><td class='judulberitabesar' valign='middle'>Agenda Kampus Terbaru</td></tr></table><br>";
foreach($query->result() as $agenda)
{
echo "<span><h2>".$agenda->tema_agenda."</h2></span>";
echo "<span class='tanggalberita'><h3>Diposting pada tanggal : ".$agenda->tgl_posting." - oleh <b>Admin</b></h3></span><br>";
echo "<span><b>Deskripsi</b> : ".$agenda->isi."</span><br>";
echo "<span><b>Tanggal</b> : ".$agenda->tgl_mulai." sampai ".$agenda->tgl_selesai."</span><br>";
echo "<span><b>Tempat</b> : ".$agenda->tempat."</span><br>";
echo "<span><b>Waktu</b> : ".$agenda->jam."</span><br>";
echo "<span><b>Keterangan</b> : ".$agenda->keterangan."</span><br><hr>";
}
?>
<table class="widget" style="border: 1pt ridge #DDDDDD;" align="center" bgcolor="#EEFAFF"><tr><td><?=$paginator;?></td></tr></table>
</div>
