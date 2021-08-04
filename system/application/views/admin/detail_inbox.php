<div id="bg-isi"><h2>E-learning Komputer</h2><br />
<?php echo form_open_multipart('admin/balasinbox');?>
<table cellspacing="1" class="widget-small" cellspacing="0" cellpadding="1" width="880">
<?php
foreach($detail->result_array() as $isi)
{
echo'<tr><td width="100">Dari</td><td width="10">:</td><td>'.$isi["nama"].'</td></tr>';
echo'<tr><td width="100" valign="top">Subjek Pesan</td><td valign="top">:</td><td><input type="text" name="subjek" value="'.$isi["subjek"].'" readonly="readonly" size="60" class="textfield"></td></tr>';
echo'<tr><td valign="top">Isi Pesan</td><td valign="top">:</td><td><textarea name="pesan" rows="20">'.$isi["pesan"].'<br><br>================<b>BALAS</b>================<br><br><b>'.$nama.'</b> : </textarea></td></tr>';
echo'<tr><tr><td width="100" valign="top"></td><td valign="top"></td><td><input type="submit" value="Kirim Pesan ke '.$isi["nama"].'" class="tombol"><input type="hidden" name="tujuan" value="'.$isi["username"].'"><input type="hidden" name="username" value="'.$isi["tujuan"].'"><input type="hidden" name="id_inbox" value="'.$isi["id_inbox"].'"></td></tr>';
}
?>
</table>
</form><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>
