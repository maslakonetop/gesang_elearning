<div id="tengah">
<span class="judulkategori">Mata Kuliah Manajemen Informatika</span><br>
<table style="border: 1pt ridge #DDDDDD;" width="470" bgcolor="#EEFAFF" cellpadding="4" cellspacing="1" class="widget-small">
<tr align="center" bgcolor="#52CAFE"><td><b>Kode MK</b></td><td><b>Mata Kuliah</b></td><td><b>SKS</b></td><td><b>Dosen</b></td><td><b>Prasyarat</b></td><td><b>SMT</b></td></tr>
<?php
foreach($query->result() as $mi)
{
if(($mi->semester%2)==0){
$warna="#B3E8FF";
} else{
$warna="#D6F3FF";
}
echo "<tr bgcolor='".$warna."'><td>".$mi->kode_mk."</td><td>".$mi->nama_mk."</td><td align='center'>".$mi->sks."</td><td>".$mi->dosen."</td><td>".$mi->prasyarat."</td><td align='center'>".$mi->semester."</td></tr>";
}
?>
</table><br>
<?php
$jum = 0;
foreach($tot_hal->result() as $mi)
{
$jum +=$mi->sks;
}
echo "Total SKS untuk Program Studi Manajemen Informatika : <b>".$jum."</b> SKS";
?>
<br><br>
<table class="widget" style="border: 1pt ridge #DDDDDD;" align="center" bgcolor="#EEFAFF"><tr><td><?=$paginator;?></td></tr></table>
</div>