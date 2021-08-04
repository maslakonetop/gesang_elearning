<div id="tengah">
	<?php
		$nomor=1;
			foreach ($judul_kat->result() as $jdl) 
				{
				$judul=$jdl->nama_kategori_download;
				}
		echo "<span class='judulkategori'>Download ".$judul."</span>";
	?>
	
<br /><br />
<table style="border: 1pt ridge #DDDDDD;" width="470" bgcolor="#FFA500" cellpadding="4" cellspacing="1" class="widget">
<tr align="center" bgcolor="#52CAFE"><td width="15"><b>No</b></td><td width="400"><b>Judul File</b></td><td width="55"><b>Action</b></td></tr>

<?php 
foreach ($query->result() as $dwn) {
if(($dwn->id_download%2)==0){
$warna="#B3E8FF";
} else{
$warna="#D6F3FF";
}
echo "<tr bgcolor=".$warna."><td align='center'>".$nomor."</td><td>".$dwn->judul_file."</td><td><a href='".base_url()."system/application/views/e-learning/download/".$dwn->nama_file."'>Download</a></td></tr>";
$nomor++;
} 
?>
</table>
<br /><table class="widget" style="border: 1pt ridge #DDDDDD;" align="center" bgcolor="#EEFAFF"><tr><td><?=$paginator;?></td></tr></table>
</div>
