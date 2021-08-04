<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>system/application/views/tes/css/tes-style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>system/application/views/e-learning/images/icon.png" />
<title>Tes Soal Online - STIKOM PGRI Banyuwangi</title>
</head>

<body>
<div id="tengah-header">
<div id="header"><img src="<?php echo base_url(); ?>system/application/views/tes/images/pict-logo.png" /></div>
<?php
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
?>
<div id="salam"><br /><br /><br /><br />Hallo, <b><?php echo $nama; ?></b> -|- <?php echo $tanggal; ?></div>
<?php
		} else{
?>
<div id="salam"><br /><br /><br /><br />Hallo, <b>Anda berkunjung sebagai tamu</b>. Silahkan Log In untuk mengikuti tes soal.</div>
<?php
		}
?>
</div>
<div id="batas-atas"><img src="<?php echo base_url(); ?>system/application/views/tes/images/bg-atas.png" /></div>