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
</style>
<h2>Ganti Password " <?php echo $nama; ?> "</h2><br />

<form method="post" action="<? echo base_url(); ?>index.php/learning/updatepassword">
<table cellspacing="5">
<tr><td width="150"><h3>Username</h3></td><td width="10">:</td><td><input type="text" name="username" readonly="readonly" value="<? echo $nim; ?>" class="textfield" size="30"></td></tr>
<tr><td width="150"><h3>Password Lama</h3></td><td width="10">:</td><td><input type="password" name="pwd_lama" class="textfield" size="30"></td></tr>
<tr><td width="150"><h3>Password Baru</h3></td><td width="10">:</td><td><input type="password" name="pwd" class="textfield" size="30"></td></tr>
<tr><td></td><td></td><td><input type="submit" value="Ganti Password" class="tombol"></td></tr>
</table></form>
