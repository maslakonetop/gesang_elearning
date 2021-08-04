<div id="kiri"><h2>Module Upload Berkas / File</h2>
<div id="isi">
<br>
<a href="<?php echo base_url(); ?>index.php/dosen/tambahupload"><div class="pagingpage"><b> + Tambah File / Upload File</b></div><br /><br /></a>
<table width="750" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Judul File</strong></td><td><strong>Kategori</strong></td><td><strong>File</strong></td><td><strong>Pemilik</strong></td><td><strong>Tgl. Upload</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
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
echo "<tr bgcolor='".$warna."'><td align='center'>".$nomor."</td><td>".$t->judul_file."</td><td>".$t->nama_kategori_download."</td><td><b><a href='".base_url()."system/application/views/e-learning/download/".$t->nama_file."'>[ Download ]</a></b></td><td>".$t->author."</td><td>".$t->tgl_posting."</td><td>
<a href='".base_url()."index.php/dosen/editupload/".$t->id_download."' title='Edit File'><img src='".base_url()."system/application/views/dosen/images/edit-icon.gif' border='0'></a></td>
<td><a href='".base_url()."index.php/dosen/hapusupload/".$t->id_download."' onClick=\"return confirm('Anda yakin ingin menghapus file ini?')\" title='Hapus File'><img src='".base_url()."system/application/views/dosen/images/hapus-icon.gif' border='0'></a></td>
</td></tr>";
$nomor++;	
}
}
else{
echo "<tr><td colspan='5'>Anda belum pernah mengupload file atau berkas</td></tr>";
}
?>
</table><br />
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table>
</div>
</div>
