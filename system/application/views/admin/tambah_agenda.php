<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahagenda"><div class="pagingpage"><b> + Tambah Agenda </b></div><br /><br /></a>
<table width="860" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('admin/simpanagenda');?>
<tr><td width="150">Tema</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="80"></td></tr>
<tr><td width="150" valign="top">Isi</td><td width="10" valign="top">:</td><td><textarea name="isi" cols="60" rows="15" class="textfield"></textarea></td></tr>
<tr><td width="150">Mulai</td><td width="10">:</td><td>
<?php
$psh=array();
$psh=explode("-",$wkt_skr);
$tgl_skr=$psh[0];
$bln_skr=$psh[1];
$thn_skr=$psh[2];

echo "<select name='tgl_mulai'>";
for($i=1;$i<32;$i++)
{
if($tgl_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='bln_mulai'>";
for($i=1;$i<13;$i++)
{
if($bln_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='thn_mulai'>";
for($i=$thn_skr-2;$i<=$thn_skr+2;$i++)
{
if($thn_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select>";
?>
</td></tr>

<tr><td width="150">Selesai</td><td width="10">:</td><td>
<?php
$psh=array();
$psh=explode("-",$wkt_skr);
$tgl_skr=$psh[0];
$bln_skr=$psh[1];
$thn_skr=$psh[2];

echo "<select name='tgl_selesai'>";
for($i=1;$i<32;$i++)
{
if($tgl_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='bln_selesai'>";
for($i=1;$i<13;$i++)
{
if($bln_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='thn_selesai'>";
for($i=$thn_skr-2;$i<=$thn_skr+2;$i++)
{
if($thn_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select>";
?>
</td></tr>
<tr><td width="150">Tempat</td><td width="10">:</td><td><input type="text" name="tempat" class="textfield" size="80"></td></tr>
<tr><td width="150">Waktu Kegiatan</td><td width="10">:</td><td><input type="text" name="jam" class="textfield" size="80"></td></tr>
<tr><td width="150" valign="top">Keterangan</td><td width="10" valign="top">:</td><td><textarea name="keterangan" cols="60" rows="5" class="textfield"></textarea></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Simpan Agenda" class="tombol"></td></tr>
</form>
</table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>