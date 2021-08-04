<div id="kiri"><h2>Module Tambah Berkas / File</h2>
<div id="isi">
<br>
<table width="760" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('dosen/simpanupload');?>
<tr><td width="150">Judul File</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="50"></td></tr>
<tr><td width="150">Kategori File / Download</td><td width="10">:</td><td>
<select name="kategori" class="textfield-option">
<?php
foreach($kategori->result_array() as $k)
{
echo "<option value='".$k["id_kategori_download"]."'>".$k["nama_kategori_download"]."</option>";
}
?>
</select>
</td></tr>
<tr><td width="150" valign="top">Gambar</td><td width="10" valign="top">:</td><td><input type="file" name="userfile" class="textfield"></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Upload Berkas" class="tombol"></td></tr>
</form>
</table>
<ul>
<li class="li-class">Nama file yang akan di-upload harap tidak mengandung karakter seperti ."`~* dan sebagainya.</li>
</ul>
<br /><br /><br /><br /><br /><br /><br /><br />
</div>
</div>
