<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahagenda"><div class="pagingpage"><b> + Tambah Agenda </b></div><br /><br /></a>
<table width="860" style="border: 1pt ridge #cccccc;" cellpadding="2" cellspacing="1" class="widget-small">
<?php echo form_open_multipart('admin/updateagenda');?>
<?php
foreach($ed->result_array() as $e){
$ps=array();
$ps=explode("-",$wkt_skr);
$tgl_skr=$ps[0];
$bln_skr=$ps[1];
$thn_skr=$ps[2];
$psh=array();
$psh=explode("-",$e["tgl_mulai"]);
$tgl_ml=$psh[2];
$bln_ml=$psh[1];
$thn_ml=$psh[0];
$psh2=array();
$psh2=explode("-",$e["tgl_selesai"]);
$tgl_sl=$psh2[2];
$bln_sl=$psh2[1];
$thn_sl=$psh2[0];
$judul=$e["tema_agenda"];
$isi=$e["isi"];
$tempat=$e["tempat"];
$waktu=$e["jam"];
$keterangan=$e["keterangan"];
$id=$e["id_agenda"];
}
?>
<tr><td width="150">Tema</td><td width="10">:</td><td><input type="text" name="judul" class="textfield" size="80" value="<?php echo $judul; ?>"></td></tr>
<tr><td width="150" valign="top">Isi</td><td width="10" valign="top">:</td><td><textarea name="isi" cols="60" rows="15" class="textfield"><?php echo $isi; ?></textarea></td></tr>
<tr><td width="150">Mulai</td><td width="10">:</td><td>
<?php
echo "<select name='tgl_mulai'>";
for($i=1;$i<32;$i++)
{
if($tgl_ml==$i){
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
if($bln_ml==$i){
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
if($thn_ml==$i){
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

echo "<select name='tgl_selesai'>";
for($i=1;$i<32;$i++)
{
if($tgl_sl==$i){
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
if($bln_sl==$i){
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
if($thn_sl==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select>";
?>
</td></tr>
<tr><td width="150">Tempat</td><td width="10">:</td><td><input type="text" name="tempat" class="textfield" size="80" value="<?php echo $tempat; ?>"></td></tr>
<tr><td width="150">Waktu Kegiatan</td><td width="10">:</td><td><input type="text" name="jam" class="textfield" size="80" value="<?php echo $waktu; ?>"></td></tr>
<tr><td width="150" valign="top">Keterangan</td><td width="10" valign="top">:</td><td><textarea name="keterangan" cols="60" rows="5" class="textfield"><?php echo $keterangan; ?></textarea></td></tr>
<tr><td width="150" valign="top"></td><td width="10" valign="top"></td><td><input type="submit" value="Simpan Agenda" class="tombol"><input type="hidden" name="id_agenda" value="<?php echo $id; ?>"</td></tr>
</form>
</table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>