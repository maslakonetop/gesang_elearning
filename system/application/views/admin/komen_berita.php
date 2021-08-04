<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahberita"><div class="pagingpage"><b> + Tambah Berita </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/katberita"><div class="pagingpage"><b> + Kategori Berita </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/komenberita"><div class="pagingpage"><b> + Lihat Komentar Berita </b></div></a>
<br /><br />
<table width="880" bgcolor="#A6EC29" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#ADF72A" align="center"><td width="10"><strong>No.</strong></td><td width="150"><strong>Nama Pengirim</strong></td><td><strong>Komentar</strong></td><td width="50"><strong>ID Berita</strong></td><td width="130"><strong>Tanggal - Jam</strong></td><td><strong>Aksi</strong></td></tr>
<?php
$nomor=$page+1;
foreach($query->result() as $b)
{
		if(($nomor%2)==0){
			$warna="#fff";
		} else{
			$warna="#D6F3FF";
		}
echo "<tr bgcolor='$warna' valign='top'><td>".$nomor."</td><td>".$b->nama."</td><td>
".$b->komentar."</td><td align='center'><a href='".base_url()."index.php/learning/detailberita/".$b->id_berita."'>".$b->id_berita."</a></td><td>".$b->tanggal." | ".$b->waktu."</td><td><a href='".base_url()."index.php/admin/hapuskomenberita/".$b->id_komen_berita."' onClick=\"return confirm('Anda yakin ingin menghapus komentar ini?')\" title='Hapus'><img src='".base_url()."system/application/views/admin/images/hapus-icon.gif' border='0'></a></td></tr>";
$nomor++;
}
?>
</table>
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>