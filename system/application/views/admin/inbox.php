<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<table width="880" bgcolor="#ccc" cellpadding="1" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Pengirim</strong></td><td><strong>Subjek Pesan</strong></td><td><strong>Waktu</strong></td><td><strong>Status</strong></td><td><strong>Aksi</strong></td></tr>
<?php
$nomor=$page+1;
if(count($query->result())>0){
foreach($query->result() as $t)
{
		if(($nomor%2)==0){
			$warna="#C8E862";
		} else{
			$warna="#D6F3FF";
		}
		if(($t->status_pesan)=="N")
		{
		$tanda_awal="<b>";
		$tanda_blk="</b>";
		$st="Belum dibaca";
		}
		else
		{
		$tanda_awal=" ";
		$tanda_blk=" ";
		$st="Sudah dibaca";
		}
$sambung="9002".$t->id_inbox."";
echo "<tr bgcolor='".$warna."'><td align='center'>".$tanda_awal."".$nomor."".$tanda_blk."</td>
<td>".$tanda_awal."".$t->nama."".$tanda_blk."</td>
<td><a href='".base_url()."index.php/admin/detailinbox/".base64_encode($sambung)."'>".$tanda_awal."".$t->subjek."".$tanda_blk."</a></td>
<td>".$tanda_awal."".$t->waktu."".$tanda_blk."</td><td>".$tanda_awal."".$st."".$tanda_blk."</td>
<td><a href='".base_url()."index.php/admin/hapusinbox/".base64_encode($sambung)."' onClick=\"return confirm('Anda yakin ingin menghapus file ini?')\" title='Hapus File'><img src='".base_url()."system/application/views/dosen/images/hapus-icon.gif' border='0'> Hapus Pesan</a>
</td></tr>";
$nomor++;	
}
}
else{
echo "<tr><td colspan='5'>Inbox Pesan anda masih kosong.</td></tr>";
}
?>
</table><br />
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table><br /><br /><br /><br /><br />
</div>
