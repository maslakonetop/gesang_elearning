<div id="kiri"><h2>Module Editor Pengumuman</h2>
<div id="isi">
<br>
<table width="610" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('dosen/updatepengumuman');?>
<?php
foreach($kategori->result_array() as $k)
{
$judul=$k["judul_pengumuman"];
$isi=$k["isi"];
$id=$k["id_pengumuman"];
}
?>
<tr><td width="150">Judul</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="80" value="<?php echo $judul; ?>"></td></tr>
<tr><td width="150" valign="top">Isi</td><td width="10" valign="top">:</td><td><textarea name="isi" cols="65" rows="25" class="textfield"><?php echo $isi; ?></textarea></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Update Pengumuman" class="tombol"><input type="hidden" name="id_pengumuman" value="<?php echo $id; ?>" /></td></tr>
</form>
</table>
</div>
</div>
