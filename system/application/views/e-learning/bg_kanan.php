<div id="kanan">
<div id="sidebar">
	<form method="post" action="<?php echo base_url(); ?>index.php/learning/pencarian">
		<table style="border: 1pt ridge #FF8C00;" bgcolor="#FF8C00" width="230" class="widget">
			<tr bgcolor="#63605F"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/search-icon.png" /> Cari Sesuatu</h2></td></tr>
				<tr><td width="70">Keyword</td><td width="5">:</td><td width="130"><input name="katakunci" type="text" class="textfield" size="16"/></td></tr>
						<tr><td width="70">Kategori</td><td width="5">:</td><td width="130">
							<select name="pencarian" class="textfield-option">
							<option class="textfield" value="tblberita">Berita</option>
							<!--<option class="textfield" value="tblpengumuman">Pengumuman</option>
							<option class="textfield" value="tblagenda">Agenda Kampus</option>-->
							<option class="textfield" value="tbltutorial">Tutorial</option>
					</select>
				</td></tr>
		<tr><td width="70"></td><td width="5"></td><td width="135"><input type="reset" value="Hapus" class="tombol"/> <input type="submit" value="Cari" class="tombol"/><br /><br /></td></tr>
		</table>
	</form>

<!--MODIFIKASI 
<form method="post" action="<?php echo base_url(); ?>index.php/learning/hasilpolling">
<table style="border: 1pt ridge #DDDDDD;" bgcolor="#EEFAFF" width="230" class="widget">
<tr bgcolor="#CEF0FF"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/forgot-icon.png" /> Polling Bulan Ini</h2></td></tr>
<?php
#($soal_polling->result_array() as $soal)
	{
		#echo "<tr><td colspan='3' width='100%' align='left'>";
		#echo "<input type='hidden' name='id_soal' value='".$soal['id_soal_poll']."'>";
		#echo $soal['soal_poll'];
		#echo "</td></tr>";
	}
?>

<?php
#foreach($jawaban_polling->result_array() as $jawaban)
	{
#		echo "<tr><td width='20' align='center'><input type='radio' name='polling' value='".$jawaban['id_jawaban_poll']."'></td><td colspan='2'>";
#		echo $jawaban['jawaban'];
#		echo "</td></tr>";
	}
?>
<tr><td colspan="3" align="center"><br /><input type="submit" value="Pilih dan Vote" class="tombol"/><br><a href="<?php echo base_url(); ?>index.php/learning/lihathasil"><div class="menu-button"><b>Lihat Hasil Polling</b></div></a></td></tr>
</table>
</form>


<table style="border: 1pt ridge #DDDDDD;" width="230" bgcolor="#EEFAFF" cellpadding="5" class="widget">
<tr bgcolor="#CEF0FF"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/berita-top-icon.png" /> Tutorial Terpopuler</h2></td></tr>
<tr><td>
<ul>
<?php
#foreach($tutorial_populer->result_array() as $pop)
{
#echo "<li class='li-class'><a href=".base_url()."index.php/learning/detailtutorial/".$pop['id_tutorial'].">".$pop['judul_tutorial']." <b>[".$pop['counter']."]</b></a></li>";
}
?>
</td></tr>
</ul>
</table>
<br>
<table style="border: 1pt ridge #DDDDDD;" width="230" bgcolor="#EEFAFF" cellpadding="5" class="widget">
<tr bgcolor="#CEF0FF"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/agenda.png" /> Agenda Kampus</h2></td></tr>
<tr><td><ul>
<?php
#foreach($agenda->result_array() as $agenda)
{
#echo "<li class='li-class'><a href=".base_url()."index.php/learning/detailagenda/".$agenda['id_agenda']." onclick=\"return hs.htmlExpand(this, { objectType: 'iframe' } )\">".$agenda['tema_agenda']."</a></li>";
}
?>
</ul></td></tr>
<tr bgcolor="#CEF0FF"><td colspan="3"><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/pict-index.png" class="image-index"/> <b><a href="<?php echo base_url(); ?>index.php/learning/agenda/">Lihat Semua Agenda</b></td></tr>
</table>

<br>
<table style="border: 1pt ridge #DDDDDD;" width="230" bgcolor="#EEFAFF" cellpadding="5" class="widget">
<tr bgcolor="#CEF0FF"><td colspan="3"><h2><img src="<?php echo base_url(); ?>system/application/views/e-learning/images/hubungi-icon.png" /> Hubungi Admin</h2></td></tr>
<tr><td>
<ul>
<li class="li-class">Untuk info, hubungi admin via YM<br /><br />
<a href = 'ymsgr:sendim?go_blind_boys'><img src="http://opi.yahoo.com/online?u=go_blind_boys&amp;m=g&amp;t=2" width="125" height="25" border=0></a></li>
</ul>
-->
</td></tr>
</table>
</div>
</div>
</div>
