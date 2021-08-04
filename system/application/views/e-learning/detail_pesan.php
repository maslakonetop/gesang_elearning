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
foreach($pesan->result_array() as $isi)
{
echo'<tr><td width="100">Dari</td><td>:</td><td>'.$isi["nama"].'</td></tr>';
echo'<tr><td width="100" valign="top">Subjek Pesan</td><td valign="top">:</td><td>'.$isi["subjek"].'</td></tr>';
echo'<tr><td width="100" valign="top">Isi Pesan</td><td valign="top">:</td><td>'.$isi["pesan"].'</td></tr>';
$nomor++;
}
?>
</table>
<a href="<? echo base_url(); ?>index.php/learning/inboxmhs"><div class="menu-user-bawah"><< Kembali ke Inbox Pesan</div></a>





