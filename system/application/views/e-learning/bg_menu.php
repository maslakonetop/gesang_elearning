<!--MENU UTAMA-->
<div id="menu-bar">
<div id="menu-tengah">
<div id="smoothmenu1" class="ddsmoothmenu">


<ul>
	<!--MENU-->
	<li><a href="<?php echo base_url(); ?>index.php">Beranda</a></li>
	
	<!--<li><a href="<?php echo base_url(); ?>index.php">Sambutan</a></li>-->
		<li><a href="#">Berita <img src="<?php echo base_url(); ?>/system/application/views/e-learning/images/down.gif" border="0"></a>
			<ul>
			  <?php
			  foreach($kategori_berita->result_array() as $daftar)
			  {
				echo "<li><a href='".base_url()."index.php/learning/katberita/".$daftar['id_kategori']."'>&#8226; Berita ".$daftar['nama_kategori']."</a></li>";
			  }
			  ?>
			 </ul>
		</li>
		
	<!--MODIFIKASI MENU-->
			<!--<li><a href="#">Perkuliahan <img src="<?php echo base_url(); ?>/system/application/views/e-learning/images/down.gif" border="0"></a>
				  <ul>
					  <li><a href="<?php echo base_url(); ?>index.php/learning/dosen">&#8226; Daftar Dosen</a></li>
						  <li><a href="#">&#8226; Mata Kuliah <img src="<?php echo base_url(); ?>/system/application/views/e-learning/images/right.gif" border="0" align="right"></a>
							  <ul>
								<li><a href="<?php echo base_url(); ?>index.php/learning/ti">&#8226; Teknik Informatika</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/learning/mi">&#8226; Manajemen Informatika</a></li>
							  </ul>
						  </li>
						  <li><a href="<?php echo base_url(); ?>index.php/learning/pengumuman">&#8226; Pengumuman</a></li>
					  <li><a href="<?php echo base_url(); ?>index.php/learning/agenda">&#8226; Agenda Kampus</a></li>
				  </ul>
			</li>-->
			
	<!--MENU DOWNLOAD-->			
			<li><a href="#">Download <img src="<?php echo base_url(); ?>/system/application/views/e-learning/images/down.gif" border="0"></a>
				  <ul>
					  <?php
						  foreach($kategori_download->result_array() as $daftar)
						  {
							echo "<li><a href='".base_url()."index.php/learning/katdownload/".$daftar['id_kategori_download']."'>&#8226; Download ".$daftar['nama_kategori_download']."</a></li>";
						  }
					  ?>
				  </ul>
			</li>
			
	<!--MENU DOWNLOAD-->
			<li><a href="#">Tutorial <img src="<?php echo base_url(); ?>/system/application/views/e-learning/images/down.gif" border="0"></a>
				  <ul>
						<li><a href="<?php echo base_url()?>>index.php/learning/kattutorial/">&#8226; PRINTER <img src="<?php echo base_url(); ?>/system/application/views/e-learning/images/right.gif" border="0" align="right"></a>
							  <ul>
								<li><a href="<?php echo base_url(); ?>index.php/learning/kattutorial/2">&#8226;Printer EPSON L200</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/learning/kattutorial/2">&#8226;Printer EPSON L350</a></li>
								<li><a href="<?php echo base_url(); ?>index.php/learning/kattutorial/2">&#8226;Printer HP LASER JET L350</a></li>
							  </ul>
						</li>
						<li><a href="<?php echo base_url(); ?>index.php/learning/kattutorial/1">&#8226; KOMPUTER </a></li>
		
						
					
					<?php
						 # foreach($kategori_tutorial->result_array() as $daftar)
						  {
							#echo "<li><a href='".base_url()."index.php/learning/kattutorial/".$daftar['id_kategori_tutorial']."'>&#8226; ".$daftar['nama_kategori']."</a></li>";
						  }
					  ?>
				  </ul>
			</li>

</ul>
<br style="clear: left" />
</div>

</div>
</div>
</div><br>
