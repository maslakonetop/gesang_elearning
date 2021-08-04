<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahberita"><div class="pagingpage"><b> + Tambah Berita </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/katberita"><div class="pagingpage"><b> + Kategori Berita </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/komenberita"><div class="pagingpage"><b> + Lihat Komentar Berita </b></div></a>
<br /><br />
<table width="870" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('admin/updateberita');?>
<?php
foreach($det->result_array() as $k)
{
$judul=$k["judul_berita"];
$isi=$k["isi"];
$gambar=$k["gambar"];
$id=$k["id_berita"];
}
?>
<tr><td width="150">Judul</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="80" value="<?php echo $judul; ?>"></td></tr>
<tr><td width="150">Kategori</td><td width="10">:</td><td>
<?php
foreach($det->result_array() as $k)
{
$id_sel=$k["id_kategori"];
}
?>
<select name="kategori" class="textfield-option">
<?php
foreach($kategori->result_array() as $k)
{
if($k["id_kategori"]==$id_sel)
{
echo "<option value='".$k["id_kategori"]."' selected>".$k["nama_kategori"]."</option>";
}
else
{
echo "<option value='".$k["id_kategori"]."'>".$k["nama_kategori"]."</option>";
}
}
?>
</select>
</td></tr>
<tr><td width="150" valign="top">Isi</td><td width="10" valign="top">:</td><td><textarea name="isi_tutorial" cols="65" rows="25" class="textfield"><?php echo $isi; ?></textarea></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><img src="<?php echo base_url(); ?>system/application/views/e-learning/berita/<?php echo $gambar;  ?>" /></td></tr>
<tr><td width="150" valign="top">Gambar</td><td width="10" valign="top">:</td><td><input type="file" name="userfile" class="textfield"> <h3>* Bila gambar tidak diganti, silahkan dikosongkan saja.</h3></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Simpan Berita" class="tombol"><input type="hidden" name="id_tutorial" value="<?php echo $id; ?>" /></td></tr>
</form>
</table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>