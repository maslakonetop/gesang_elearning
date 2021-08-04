<div id="tengah">
<div id="kiri"><h2>Selamat Mengerjakan Tes Soal Online</h2>
<div id="isi">
<?php
	$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
	if($session!=""){
?>
<br />
<script language="JavaScript" type="text/JavaScript">
var TimeOver = true

function getJam(Tanggal)
{
   Jam =  (Tanggal.getHours() < 10) ? "0"  + Tanggal.getHours()  + ":" : Tanggal.getHours() + ":"
   Jam += (Tanggal.getMinutes() < 10) ? "0" + Tanggal.getMinutes() + ":" : Tanggal.getMinutes() + ":"
   Jam += (Tanggal.getSeconds() < 10) ? "0" + Tanggal.getSeconds() : Tanggal.getSeconds()
   return Jam
}
function dispJam()
{
   TglCur = new Date()
   document.User.Watch.value = getJam(TglCur)
   document.User2.Watch.value = getJam(TglCur)
   document.User.TimeTaken.value = getWaktu(TglCur,TglStart)
   document.User2.TimeTaken.value = getWaktu(TglCur,TglStart)
   if ((Tgl.getTime() - TglCur.getTime()) <= 0)
   {
      if(TimeOver) TimeOverWarn()
      document.User.TimeLeft.value = "Habis"
      document.User2.TimeLeft.value = "Habis"
   }
   else
   {
		document.User.TimeLeft.value = getWaktu(Tgl,TglCur)
		document.User2.TimeLeft.value = getWaktu(Tgl,TglCur)
    	setTimeout("dispJam()",1000)
    }
}
function getWaktu(Tgl,TglCur)
{
   TmLf = Tgl.getTime() - TglCur.getTime()
   TmLfHours = Math.floor(TmLf/3600000) 
   TmLfMinutes = Math.floor((TmLf%3600000)/60000)
   TmLfSeconds = Math.round((TmLf%60000)/1000)
   TmLfStr = (TmLfHours < 10) ? "0" + TmLfHours + ":" : TmLfHours + ":"
   TmLfStr += (TmLfMinutes < 10) ? "0" + TmLfMinutes + ":" : TmLfMinutes + ":"
   TmLfStr += (TmLfSeconds < 10) ? "0" + TmLfSeconds : TmLfSeconds
   return TmLfStr
}
function TimeOverWarn()
{
   alert("\n Maaf, <?= $nama?> ....\n Waktu Anda Habis")
   TimeOver = true
   return true
}
Tanggal =  new Date()
Tgl = new Date()
TglStart = new Date()
ArrayBulan = new Array("Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember")
Tahun =  Tanggal.getYear()
TglStr = Tanggal.getDate()  + " " + ArrayBulan[Tanggal.getMonth()] + " " + Tahun
Tgl.setTime(Tgl.getTime() + 30 * 60 * 1000) 

function selesai() {
document.ljkform.submit.click();
clearTimeout(timeID);
} 
function timer() {
timeID=setTimeout("selesai()",60000*30);
}
 
function init() {
  dispJam();
  timer();
}

window.onload = init;
</script>
<table width="600" style="border: 1pt ridge #DDDDDD;" bgcolor="#F2FCFE" cellpadding="1" cellspacing="1" class="widget-small" align="center"><tr><td>
Anda berada di : <b><a href="<?php echo base_url(); ?>index.php/tes">Beranda</a></b> >> <b><a href="<?php echo base_url(); ?>index.php/tes/katalogsoal">Katalog Soal</a></b> >> <b>
<?php
	foreach($judul->result_array() as $jdl)
	{
		echo "<a href='".base_url()."index.php/tes/lihatsoal/".$jdl["id_mk"]."'>".$jdl["nama_mk"]."</a></b> >> <b>Soal ".$jdl["no_soal"]." ".$jdl["nama_mk"]."</a>";
	}
?>
</b><br />
</td></tr></table>
<FORM NAME="User"> 
<table width="600" style="border: 1pt ridge #DDDDDD;" bgcolor="#F2FCFE" cellpadding="2" cellspacing="1" class="widget-small" align="center">
   <tr><td align="left">Sisa Waktu: <input readonly="true" type="text" size="8" class="timer" name="TimeLeft"></td>
   <td align="left">Waktu Berjalan: <input readonly="true" type="text" size="8" class="timer" name="TimeTaken"></td>
   <td align="left">Sekarang Jam: <input readonly="true" type="text" size="8" class="timer" name="Watch"></td></tr>
   </table>
</FORM>
<form name="ljkform" method="post" action="<?php echo base_url(); ?>index.php/tes/hasiltes">
<table width="600" cellpadding="2" cellspacing="1" class="widget-small">
<?php
	$nomor=1;
	foreach($soal->result_array() as $jwb)
	{
		$no_soal=$jwb["no_soal"];
		$id_mk=$jwb["id_matkul"];
		$matkul=$jwb["nama_mk"];
		echo "<tr><td width='20'>".$nomor."</td><td>".$jwb["pertanyaan"]."</td></tr><tr>";
		echo "<td></td><td><input type='radio' value='a' name='pilih[".$jwb["id_soal"]."]'>A. ".$jwb["jwb_a"]."</td></tr>";
		echo "<td></td><td><input type='radio' value='b' name='pilih[".$jwb["id_soal"]."]'>B. ".$jwb["jwb_b"]."</td></tr>";
		echo "<td></td><td><input type='radio' value='c' name='pilih[".$jwb["id_soal"]."]'>C. ".$jwb["jwb_c"]."</td></tr>";
		if($jwb["jwb_d"]!="")
		{
			echo "<td></td><td><input type='radio' value='d' name='pilih[".$jwb["id_soal"]."]'>D. ".$jwb["jwb_d"]."</td></tr>";
		}
		else
		{
			echo "";
		}
		if($jwb["jwb_e"]!="")
		{
			echo "<td></td><td><input type='radio' value='e' name='pilih[".$jwb["id_soal"]."]'>E. ".$jwb["jwb_e"]."</td></tr>";
		}
		else
		{
			echo "";
		}
		$nomor++;
	}
	echo "<input type='hidden' name='no_soal' value='".$no_soal."'>";
	echo "<input type='hidden' name='id_mk' value='".$id_mk."'>";
	echo "<input type='hidden' name='banyak_soal' value='".$jumlah."'>";
	echo "<input type='hidden' name='matkul' value='".$matkul."'>";
?>
<tr><td></td><td><br /><input type="submit" value="Selesai dan Kirim Jawaban ke Server" name="submit" class="tombol" onclick="return confirm("yakin")"/><br /><br /></td></tr>
</table>
</form>
<FORM NAME="User2"> 
<table width="600" style="border: 1pt ridge #DDDDDD;" bgcolor="#F2FCFE" cellpadding="2" cellspacing="1" class="widget-small" align="center">
   <tr><td align="left">Sisa Waktu: <input readonly="true" type="text" size="8" class="timer" name="TimeLeft"></td>
   <td align="left">Waktu Berjalan: <input readonly="true" type="text" size="8" class="timer" name="TimeTaken"></td>
   <td align="left">Sekarang Jam: <input readonly="true" type="text" size="8" class="timer" name="Watch"></td></tr>
   </table>
</FORM>
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