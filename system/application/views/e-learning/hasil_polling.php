<div id="tengah">
<?php
?>
<span class="judulkategori">Hasil Polling Sementara</span><br><br>
Terimakasih atas partisipasi Anda untuk mengikuti polling kami bulan ini. Tunggu polling-polling selanjutnya di website E-Learning STIKOM PGRI Banyuwangi.<br><br>
<?php
foreach($soal_polling->result_array() as $tmpl_soal){
echo "<h2>".$tmpl_soal['soal_poll']."</h2>";
}
$jum = 0;
foreach($jawaban_polling->result_array() as $tmpl_jwb){
$jum += $tmpl_jwb['counter'];
}
echo '<table style="border: 1pt ridge #DDDDDD;" bgcolor="#EEFAFF" width="470" class="widget">';
foreach($jawaban_polling->result_array() as $tmpl_jwb){
$pr = sprintf("%2.1f",(($tmpl_jwb['counter']/$jum)*100));
$gbr = $pr * 1;
echo "<tr><td width='100'>&#8226; <b>".$tmpl_jwb['jawaban']."</b></td><td width='300'><img src='".base_url()."system/application/views/e-learning/images/vote.jpg' width='".$gbr."' height='20'></td><td width='70'>".$pr." %<br></td></tr>";
}
echo '</table>';
echo "Hasil berdasarkan dari ".$jum." orang responden.";
?>
</div>
