<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahtutorial"><div class="pagingpage"><b> + Tambah Tutorial </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/kattutorial"><div class="pagingpage"><b> + Kategori Tutorial</b></div></a><br><br>
<table width="880" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Judul Tutorial</strong></td><td><strong>Kategori</strong></td><td><strong>Penulis</strong></td><td><strong>Tanggal</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
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
echo "<tr bgcolor='".$warna."'><td align='center'>".$nomor."</td><td>".$t->judul_tutorial."</td><td>".$t->nama_kategori."</td><td>".$t->author."</td><td>".$t->tanggal."</td><td>
<a href='".base_url()."index.php/admin/edittutorial/".$t->id_tutorial."' title='Edit Tutorial'><img src='".base_url()."system/application/views/admin/images/edit-icon.gif' border='0'></a></td>
<td><a href='".base_url()."index.php/admin/hapustutorial/".$t->id_tutorial."' onClick=\"return confirm('Anda yakin ingin menghapus tutorial ini?')\" title='Hapus Tutorial'><img src='".base_url()."system/application/views/admin/images/hapus-icon.gif' border='0'></a></td>
</td></tr>";
$nomor++;	
}
}
else{
echo "<tr><td colspan='5'>Anda belum pernah menuliskan tutorial</td></tr>";
}
?>
</table><br />
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table><br /><br /><br /><br /><br />
</div>
