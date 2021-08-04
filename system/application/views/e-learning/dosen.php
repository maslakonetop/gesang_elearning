<div id="tengah">
<table style="border: 1pt ridge #DDDDDD;" width="470" bgcolor="#EEFAFF" cellpadding="4" cellspacing="1" class="widget">
<?php
$no=$hal+1;
echo "<span class='judulkategori'>Daftar Dosen STIKOM PGRI Banyuwangi</span><br>";
foreach($query->result() as $dsn)
{
if(($no%2)==0){
$warna="#B3E8FF";
} else{
$warna="#D6F3FF";
}
echo "<tr bgcolor='".$warna."'><td align='center'>".$no."</td><td>".$dsn->dosen."</td></tr>";
$no++;
}
?>
</table><br>
<table class="widget" style="border: 1pt ridge #DDDDDD;" align="center" bgcolor="#EEFAFF"><tr><td><?=$paginator;?></td></tr></table>
</div>