<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahagenda"><div class="pagingpage"><b> + Tambah Agenda </b></div><br /><br /></a>
<table width="880" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Tema Agenda</strong></td><td><strong>Mulai</strong></td><td><strong>Selesai</strong></td><td><strong>Waktu</strong></td><td><strong>Posting</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
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
echo "<tr bgcolor='".$warna."'><td align='center'>".$nomor."</td><td>".$t->tema_agenda."</td><td>".$t->tgl_mulai."</td><td>".$t->tgl_selesai."</td><td>".$t->jam."</td><td>".$t->tgl_posting."</td><td>
<a href='".base_url()."index.php/admin/editagenda/".$t->id_agenda."' title='Edit Agenda'><img src='".base_url()."system/application/views/admin/images/edit-icon.gif' border='0'></a></td>
<td><a href='".base_url()."index.php/admin/hapusagenda/".$t->id_agenda."' onClick=\"return confirm('Anda yakin ingin menghapus agenda ini?')\" title='Hapus Agenda'><img src='".base_url()."system/application/views/admin/images/hapus-icon.gif' border='0'></a></td>
</td></tr>";
$nomor++;	
}
}
else{
echo "<tr><td colspan='5'>Belum ada agenda</td></tr>";
}
?>
</table><br />
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>