<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahberita"><div class="pagingpage"><b> + Tambah Berita </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/katberita"><div class="pagingpage"><b> + Kategori Berita </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/komenberita"><div class="pagingpage"><b> + Lihat Komentar Berita </b></div></a>
<br /><br />
<table width="870" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('admin/simpanberita');?>
<tr><td width="150">Judul</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="80"></td></tr>
<tr><td width="150">Kategori</td><td width="10">:</td><td>
<select name="kategori" class="textfield-option">
<?php
foreach($kategori->result_array() as $k)
{
echo "<option value='".$k["id_kategori"]."'>".$k["nama_kategori"]."</option>";
}
?>
</select>
</td></tr>
<tr><td width="150" valign="top">Isi</td><td width="10" valign="top">:</td><td><textarea name="isi" cols="65" rows="25" class="textfield"></textarea></td></tr>
<tr><td width="150" valign="top">Gambar</td><td width="10" valign="top">:</td><td><input type="file" name="userfile"></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Simpan Berita" class="tombol"></td></tr>
</form>
</table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>
