<div id="tengah">
	<?php
		foreach($detail->result_array() as $rows) {
			$id_berita=$rows['id_tutorial'];
				echo "<table><tr><td valign='top' width='55'><img src='".base_url()."system/application/views/e-learning/images/det_berita.png'></td><td class='judulberitabesar' valign='middle'>".$rows['judul_tutorial']."</td></tr></table>";
				//echo "Kategori <a href=".base_url()."index.php/learning/kattutorial/".$rows['id_kategori_tutorial']."><b>".$rows['nama_kategori']."</a></b> | <span class='tanggalberita'>".$rows['tanggal']." - ".$rows['waktu']." WIB</span> | by <em><strong>".$rows["author"]."</strong></em><br>";
				//echo"<span>Share this article on : "; 
	?>
	<!--
		<script language="javascript">
			document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>&#8226; Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>&#8226; Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Digg</a>");
		</script>
	-->
	<?php
	
		$isian=nl2br($rows['isi']);
		echo "<br><p><span><img src='".base_url()."system/application/views/e-learning/tutorial/".$rows['gambar']."' class='image'></span>".$isian."<br><br>";
		//echo"<span>Share this article on : ";
	?>
<!--
<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'>&#8226; Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'>&#8226; Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'>&#8226; Digg</a>");
</script>
-->

<?php
//Menampilkan 5 Tutorial Acak
	//echo"<br>Tutorial ini dibaca sebanyak<b> ".$rows['counter']." kali</b><br>
	//echo "<span class='berita-lain'><img src='".base_url()."system/application/views/e-learning/images/icon-berita.png'>Baca Juga Tutorial Lainnya</span>";
	//echo"<ul>";
		//foreach($acak_tutorial->result_array() as $acak)
{
	//echo "<li><a href='".base_url()."index.php/learning/detailtutorial/".$acak['id_tutorial']."'>".$acak['judul_tutorial']."</a></li>";
}
//echo"</ul>";
?>

<div>
<?php
}
?>
</div>
</div>


