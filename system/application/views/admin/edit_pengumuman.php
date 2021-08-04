<div id="bg-isi"><h2>Pengumuman E-Learning</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/pengumuman"><div class="pagingpage"><b> + Pengumuman </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/tambahpengumuman"><div class="pagingpage"><b> + Tambah Pengumuman </b></div><br /><br /></a>

<table width="870" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('admin/updatepengumuman');?>
<?php
foreach($det->result_array() as $k)
{
$judul=$k["judul_pengumuman"];
$isi=$k["isi"];
$id=$k["id_pengumuman"];
}
?>
<tr><td width="150">Judul</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="80" value="<?php echo base_url($judul); ?>"></td></tr>
<tr><td width="150" valign="top">Isi</td><td width="10" valign="top">:</td><td><textarea name="isi" cols="65" rows="25" class="textfield"><?php echo $isi; ?></textarea></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Update Pengumuman" class="tombol"><input type="hidden" name="id_pengumuman" value="<?php echo $id; ?>" /></td></tr>
</form>
</table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>

