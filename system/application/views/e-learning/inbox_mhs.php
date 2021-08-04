<style>
body{
	background-image:url(images/bg-body.jpg);
	background-repeat:repeat-x;
	background-attachment:fixed;
	background-position:bottom;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
}
h2{
	font-size:15px;
	padding:0px;
	margin:0px;
	font-weight:bold;
	color:#666666;
}
h3{
	font-size:12px;
	padding:0px;
	margin:0px;
	font-weight:normal;
	color:#666666;
}
.tombol{
background-color:#EEFAFF;
border:1px solid #DDDDDD;
font-size:11px;
color:#666666;
font-weight:bold;
}
.textfield{
background-color:#EEFAFF;
-moz-border-radius:4px;
-khtml-border-radius: 4px;
-webkit-border-radius: 4px;
border-radius:4px;
font-size:12px;
font-family:Arial;
}
.widget-small{
	font-size:11px;
}
a{
color:orange;
text-decoration:none;
}
a:hover{
color:#999999;
text-decoration:none;
}
</style>
<h2>Inbox <?php echo $nama; ?></h2><br />

<table cellspacing="1" class="widget-small" cellspacing="0" cellpadding="1" width="370">
<?php
$nomor=1;
if(count($pesan->result_array())>0){
foreach($pesan->result_array() as $isi)
{
if(($nomor%2)==0){
$warna="#B3E8FF";
} else{
$warna="#D6F3FF";
}
if($isi["status_pesan"]=="N"){
$tbl_dpn="<b><blink>";
$tbl_blk="</blink></b>";
} else{
$tbl_dpn="";
$tbl_blk="";
}
$sambung="9002".$isi["id_inbox"]."";
echo'<tr bgcolor="'.$warna.'"><td width="10" align="center">'.$tbl_dpn.''.$nomor.''.$tbl_blk.'</td><td width="150"><a href="'.base_url().'index.php/learning/detailpesan/'.$isi["username"].'/'.base64_encode($sambung).'">'.$tbl_dpn.''.$isi["nama"].''.$tbl_blk.''.$tbl_dpn.' ('.$isi["subjek"].')</a>'.$tbl_blk.'</td><td width="5" align="center">';
?>

<?php
echo"<a href='".base_url()."index.php/learning/hapuspesan/".base64_encode($sambung)."' title='Hapus Pesan dari ".$isi["nama"]."' onClick=\"return confirm('Anda yakin ingin menghapus file ini?')\"><b>x</b></td></tr>".$tbl_blk."";
$nomor++;
}
} else{
echo"Belum ada pesan untuk anda";
}
?>
</table>
<br><br><br><br><br>





