<div id="tengah">
<div id="kiri"><h2>Rekap Nilai Hasil Tes Soal Online</h2>
<div id="isi"><br>
<table width="600" style="border: 1pt ridge #DDDDDD;" bgcolor="#F2FCFE" cellpadding="2" cellspacing="1" class="widget-small" align="center">
<?php
echo "<tr><td width='150'>Nama Peserta</td><td width='10'>:</td><td>".$nama."</td></tr>";
echo "<tr><td width='150'>Nomor Induk Mahasiswa</td><td width='10'>:</td><td>".$nim."</td></tr>";
?>
</table>
<table width="600" bgcolor="#C8E862" cellpadding="2" cellspacing="1" class="widget-small" style="border: 1pt ridge #DDDDDD;" align="center">
<tr><td width="30">No.</td><td width="400">Mata Kuliah</td><td width="80">Soal</td><td>Nilai</td></tr>
<?php
$nomor=$page+1;
if(count($query->result())>0){
	foreach($query->result() as $nl)
	{
		if(($nomor%2)==0){
			$warna="#FFFFFF";
		} else{
			$warna="#D6F3FF";
		}
		echo "<tr bgcolor='".$warna."'><td>".$nomor."</td><td>".$nl->nama_mk."</td><td>Soal ".$nl->no_soal."</td><td>".$nl->hasil."</td></tr>";
		$nomor++;
	}
}
else{

		echo "<tr bgcolor='#D6F3FF'><td colspan='4' align='center'>Nilai masih kosong. Anda belum mengikuti tes soal manapun.</td></tr>";

}
?>
</table><br />
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table>
</div>
</div>
