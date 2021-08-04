<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahupload"><div class="pagingpage"><b> + Tambah File / Upload File</b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/katdownload"><div class="pagingpage"><b> + Kategori Download</b></div><br /><br /></a>
<?php echo form_open_multipart('admin/updatekatdownload');?>
<table width="520" cellpadding="2" cellspacing="1" class="widget-small">
<?php
foreach($det->result_array() as $k)
{
$nama_kategori=$k["nama_kategori_download"];
$id_kategori=$k["id_kategori_download"];
}
?>
<tr><td width="150" valign="top">Id Kategori Download</td><td width="10" valign="top">:</td><td><input type="text" name="id_kat" class="textfield" size="50" value="<?php echo $id_kategori; ?>" readonly="readonly"/></td></tr>
<tr><td width="150" valign="top">Nama Kategori Download</td><td width="10" valign="top">:</td><td><input type="text" name="nama" class="textfield" size="50" value="<?php echo $nama_kategori; ?>"/></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" class="tombol" value="Simpan Nama" /></td></tr>
</table>
</form>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>