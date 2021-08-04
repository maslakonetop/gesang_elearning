<div id="kiri"><h2>Module Tambah Tutorial</h2>
<div id="isi">
<br>
<table width="610" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('dosen/simpantutorial');?>
<tr><td width="150">Judul</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="80"></td></tr>
<tr><td width="150">Kategori</td><td width="10">:</td><td>
<select name="kategori" class="textfield-option">
<?php
foreach($kategori->result_array() as $k)
{
echo "<option value='".$k["id_kategori_tutorial"]."'>".$k["nama_kategori"]."</option>";
}
?>
</select>
</td></tr>
<tr><td width="150" valign="top">Isi</td><td width="10" valign="top">:</td><td><textarea name="isi_tutorial" cols="65" rows="25" class="textfield"></textarea></td></tr>
<tr><td width="150" valign="top">Gambar</td><td width="10" valign="top">:</td><td><input type="file" name="userfile"></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Simpan Tutorial" class="tombol"></td></tr>
</form>
</table>
</div>
</div>
