<div id="tengah">
<div id="kiri"><h2>Selamat Mengerjakan Tes Soal Online</h2>
<div id="isi">
<?php
	$benar=0;
	$salah=0;
	foreach($hit_hasil->result_array() as $hasil)
	{
		$jwb=$jawaban;
		$id=$hasil["id_soal"];
		if($jwb[$id]==$hasil["kunci"])
		{
			$benar++;
			
		}
		else {
			$salah++;
			
		}
	}
	$nilai=sprintf("%2.1f",$benar/$jumlah*100);
	echo "Mata Kuliah = ".$matkul."<br>";
	echo "Benar = ".$benar."<br>";
	echo "Salah = ".$salah."<br>";
	echo "Jumlah Soal = ".$jumlah." soal<br>";
	echo "Nilai = ".$nilai."<br>";
?>
</div>
</div>
