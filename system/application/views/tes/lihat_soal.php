<div id="tengah">
<div id="kiri">
<?php
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
	if($session!=""){
?>
<h2>Selamat Mengerjakan Tes Soal Online</h2><br />
<table width="600" style="border: 1pt ridge #DDDDDD;" bgcolor="#F2FCFE" cellpadding="2" cellspacing="1" class="widget-small" align="center"><tr><td>
Anda berada di : <b><a href="<?php echo base_url(); ?>index.php/tes">Beranda</a></b> >> <b><a href="<?php echo base_url(); ?>index.php/tes/katalogsoal">Katalog Soal</a></b> >> <b>
<?php
	foreach($judul->result() as $jdl)
	{
		echo $jdl->nama_mk;
	}
?>
</b><br />
</td></tr></table>
Silahkan pilih salah satu dari beberapa kumpulan soal-soal di bawah ini. Dan jawablah soal-soal yang tersedia dengan baik. Selamat mengerjakan. Salam Sukses...
<div id="isi">
<br /><table cellpadding="3" cellspacing="1" style="border: 1pt ridge #C8E862;" bgcolor="#EEFAFF" class="widget" width="600">
<?php
	$nomor=$page+1;
	foreach($query->result() as $kat)
	{
		if(($nomor%2)==0){
			$warna="#FFFFFF";
		} else{
			$warna="#D6F3FF";
		}
		echo "<tr bgcolor='".$warna."'><td width='20' align='center'>".$nomor."</td><td width='460'><a href='".base_url()."index.php/tes/ikutites/".$kat->id_matkul."/".$kat->no_soal."' onClick=\"return confirm('Anda akan mengikuti tes soal online dengan mata kuliah ".$kat->nama_mk." . Persiapkan diri terlebih dahulu, dan waktu tes akan berjalan secara otomatis.')\">Soal  ".$nomor.
		" ".$kat->nama_mk."</a></td><td><img src='".base_url()."system/application/views/e-learning/images/bullet.gif'> <a href='".base_url()."index.php/tes/ikutites/".$kat->id_matkul."/".$kat->no_soal."' onClick=\"return confirm('Anda akan mengikuti tes soal online dengan mata kuliah ".$kat->nama_mk." . Persiapkan diri terlebih dahulu, dan waktu tes akan berjalan secara otomatis.')\">[ Ikuti Tes Ini ]</a></td></tr>";
		$nomor++;
	}
?>
</table><br />
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table><br /><br /><br />
<?php
	}
	else{
?>
	<script type="text/javascript" language="javascript">
		alert("Log In dulu untuk masuk ke sini");
	</script>
	<table height="300" width="600" style="border: 1pt ridge #DDDDDD;" bgcolor="#F2FCFE" cellpadding="2" cellspacing="1" class="widget-small" align="center"><tr><td valign="top">You are not authorised...!!!!!</td></tr></table>
<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/tes'>"; 		
	}
?>
</div>
</div>
