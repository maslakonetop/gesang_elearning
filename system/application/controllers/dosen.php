<?php

class Dosen extends Controller {

	function Dosen()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library('image_lib');
		$this->load->plugin();
		session_start();
	}
	
	function index()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="PA"){
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('dosen/bg_atas',$data);
			$this->load->view('dosen/bg_menu');
			$this->load->view('dosen/isi_index',$data);
			$this->load->view('dosen/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function tutorial()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
			if($data["status"]=="PA"){
		$data["tanggal"] = mdate($datestring, $time);
		$this->load->model('Dosen_model');
		$this->load->library('Pagination');	
		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$query=$this->Dosen_model->Tampil_Tutorial($data["nim"],$limit_ti,$offset_ti);
		$tot_hal = $this->Dosen_model->Total_Tutorial($data["nim"]);
      		$config['base_url'] = base_url() . '/index.php/dosen/tutorial';
       		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit_ti;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
	   	$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
		$this->load->view('dosen/bg_atas',$data);
		$this->load->view('dosen/bg_menu');
		$this->load->view('dosen/tutorial',$data_isi);
		$this->load->view('dosen/bg_bawah');
			}
					else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function tambahtutorial()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';

		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="PA"){
			$this->load->model('Dosen_model');
			$data["kategori"]=$this->Dosen_model->Kat_Tutorial();
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('dosen/bg_atas',$data);
			$this->load->view('dosen/bg_menu');
			$this->load->view('dosen/tambah_tutorial',$data);
			$this->load->view('dosen/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function simpantutorial()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			if(empty($_FILES['userfile']['name'])){
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["judul_tutorial"]=$this->input->post('judul');
			$in["isi"]=$this->input->post('isi_tutorial');
			$in["author"]=$nim;
			$in["id_kategori_tutorial"]=$this->input->post('kategori');
			$in["counter"]=0;
			$in["gambar"]="gbr-tutor.jpg";
			$this->Dosen_model->Simpan_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/tutorial'>";
			}
			else{
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["judul_tutorial"]=$this->input->post('judul');
			$in["isi"]=$this->input->post('isi_tutorial');
			$in["author"]=$nim;
			$in["id_kategori_tutorial"]=$this->input->post('kategori');
			$in["counter"]=0;
			$in["gambar"]=$_FILES['userfile']['name'];
			$config['upload_path'] = './system/application/views/e-learning/tutorial/';
			$config['allowed_types'] = 'bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '400';
			$config['max_height'] = '300';						
			$this->load->library('upload', $config);
		
			if(!$this->upload->do_upload())
			{
			 echo $this->upload->display_errors();
			}
			else {
			$this->Dosen_model->Simpan_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/tutorial'>";
			}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}

	function edittutorial()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="PA"){
			$this->load->model('Dosen_model');
			$data["kategori"]=$this->Dosen_model->Edit_Tutorial($id,$data["nim"]);
			$data["cur_kat"]=$this->Dosen_model->Kat_Tutorial();
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('dosen/bg_atas',$data);
			$this->load->view('dosen/bg_menu');
			$this->load->view('dosen/edit_tutorial',$data);
			$this->load->view('dosen/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function updatetutorial()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$config['upload_path'] = './system/application/views/e-learning/tutorial/';
			$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|mid|midi|mp2|mp3|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
			$config['max_size'] = '10000';
			$config['max_width'] = '400';
			$config['max_height'] = '300';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$in["judul_tutorial"]=$this->input->post('judul');
				$in["isi"]=$this->input->post('isi_tutorial');
				$in["id_tutorial"]=$this->input->post('id_tutorial');
				$in["author"]=$nim;
				$in["id_kategori_tutorial"]=$this->input->post('kategori');
				$this->Dosen_model->Update_Tutorial($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/tutorial'>";
				
			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$in2["judul_tutorial"]=$this->input->post('judul');
				$in2["isi"]=$this->input->post('isi_tutorial');
				$in2["id_tutorial"]=$this->input->post('id_tutorial');
				$in2["author"]=$nim;
				$in2["gambar"]=$_FILES['userfile']['name'];
				$in2["id_kategori_tutorial"]=$this->input->post('kategori');
				$this->Dosen_model->Update_Tutorial($in2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/tutorial'>";
				}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function hapustutorial()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$this->Dosen_model->Delete_Tutorial($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/tutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function pengumuman()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
			if($data["status"]=="PA"){
		$data["tanggal"] = mdate($datestring, $time);
		$this->load->model('Dosen_model');
		$this->load->library('Pagination');	
		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$query=$this->Dosen_model->Tampil_Pengumuman($data["nim"],$limit_ti,$offset_ti);
		$tot_hal = $this->Dosen_model->Total_Pengumuman($data["nim"]);
      		$config['base_url'] = base_url() . '/index.php/dosen/pengumuman';
       		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit_ti;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
	   	$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
		$this->load->view('dosen/bg_atas',$data);
		$this->load->view('dosen/bg_menu');
		$this->load->view('dosen/pengumuman',$data_isi);
		$this->load->view('dosen/bg_bawah');
			}
					else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function tambahpengumuman()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';

		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="PA"){
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('dosen/bg_atas',$data);
			$this->load->view('dosen/bg_menu');
			$this->load->view('dosen/tambah_pengumuman',$data);
			$this->load->view('dosen/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function simpanpengumuman()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$in["tanggal"] = mdate($tgl,$time);
			$in["judul_pengumuman"]=$this->input->post('judul');
			$in["isi"]=$this->input->post('isi');
			$in["penulis"]=$nim;
			$this->Dosen_model->Simpan_Pengumuman($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/pengumuman'>";

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function editpengumuman()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="PA"){
			$this->load->model('Dosen_model');
			$data["kategori"]=$this->Dosen_model->Edit_Pengumuman($id,$data["nim"]);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('dosen/bg_atas',$data);
			$this->load->view('dosen/bg_menu');
			$this->load->view('dosen/edit_pengumuman',$data);
			$this->load->view('dosen/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function updatepengumuman()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="PA"){
				$in["judul_pengumuman"]=$this->input->post('judul');
				$in["isi"]=$this->input->post('isi');
				$in["id_pengumuman"]=$this->input->post('id_pengumuman');
				$in["penulis"]=$nim;
				$this->load->model('Dosen_model');
				$this->Dosen_model->Update_Pengumuman($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function hapuspengumuman()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$this->Dosen_model->Delete_Pengumuman($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function upload()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
			if($data["status"]=="PA"){
		$data["tanggal"] = mdate($datestring, $time);
		$this->load->model('Dosen_model');
		$this->load->library('Pagination');	
		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$query=$this->Dosen_model->Tampil_File($data["nim"],$limit_ti,$offset_ti);
		$tot_hal = $this->Dosen_model->Total_File($data["nim"]);
      		$config['base_url'] = base_url() . '/index.php/dosen/upload';
       		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit_ti;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
	   	$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
		$this->load->view('dosen/bg_atas',$data);
		$this->load->view('dosen/bg_menu');
		$this->load->view('dosen/upload',$data_isi);
		$this->load->view('dosen/bg_bawah');
			}
					else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function tambahupload()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';

		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="PA"){
			$this->load->model('Dosen_model');
			$data["kategori"]=$this->Dosen_model->Kat_Down();
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('dosen/bg_atas',$data);
			$this->load->view('dosen/bg_menu');
			$this->load->view('dosen/tambah_upload',$data);
			$this->load->view('dosen/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function simpanupload()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$in["tgl_posting"] = mdate($tgl,$time);
			$in["judul_file"]=$this->input->post('judul');
			$in["author"]=$nim;
			$in["id_kat"]=$this->input->post('kategori');
			$acak=rand(00000000000,99999999999);
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni=$pisah[0];
			$ubah=$acak.$nama_murni; //tanpa ekstensi
			$config["file_name"]=$ubah; //dengan eekstensi
			$in["nama_file"]=$acak.$nm;
			$config['upload_path'] = './system/application/views/e-learning/download/';
			$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|mid|midi|mp2|mp3|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
			$config['max_size'] = '50000';
			$config['max_width'] = '400';
			$config['max_height'] = '300';						
			$this->load->library('upload', $config);
		
			if(!$this->upload->do_upload())
			{
			 echo $this->upload->display_errors();
			}
			else {
			$this->Dosen_model->Simpan_Upload($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/upload'>";
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function editupload()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="PA"){
			$this->load->model('Dosen_model');
			$data["kategori"]=$this->Dosen_model->Edit_Upload($id,$data["nim"]);
			$data["cur_kat"]=$this->Dosen_model->Kat_Down();
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('dosen/bg_atas',$data);
			$this->load->view('dosen/bg_menu');
			$this->load->view('dosen/edit_upload',$data);
			$this->load->view('dosen/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function updateupload()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$config['upload_path'] = './system/application/views/e-learning/download/';
			$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|mid|midi|mp2|mp3|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
			$config['max_size'] = '10000';
			$config['max_width'] = '400';
			$config['max_height'] = '300';
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$in2["nama_file"]=$acak.$nm;			
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$in["judul_file"]=$this->input->post('judul');
				$in["id_download"]=$this->input->post('id_download');
				$in["id_kat"]=$this->input->post('kategori');
				$this->Dosen_model->Update_Upload($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/upload'>";
				
			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$in2["judul_file"]=$this->input->post('judul');
				$in2["id_download"]=$this->input->post('id_download');
				$in2["id_kat"]=$this->input->post('kategori');

				$this->Dosen_model->Update_Upload($in2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/upload'>";
				}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function hapusupload()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$this->Dosen_model->Delete_Upload($id);
			$hapus=$this->Admin_model->Edit_Upload($id);
			foreach($hapus->result() as $t)
			{
				unlink("./system/application/views/e-learning/download/$t->nama_file");
			}
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/upload'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function inbox()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
			if($data["status"]=="PA"){
		$data["tanggal"] = mdate($datestring, $time);
		$this->load->model('Dosen_model');
		$this->load->library('Pagination');	
		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$query=$this->Dosen_model->Tampil_Inbox($data["nim"],$limit_ti,$offset_ti);
		$tot_hal = $this->Dosen_model->Total_Inbox($data["nim"]);
      		$config['base_url'] = base_url() . '/index.php/dosen/inbox';
       		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit_ti;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
	   	$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
		$this->load->view('dosen/bg_atas',$data);
		$this->load->view('dosen/bg_menu');
		$this->load->view('dosen/inbox',$data_isi);
		$this->load->view('dosen/bg_bawah');
			}
					else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function detailinbox()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="PA"){
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->model('Dosen_model');
			$data["detail"]=$this->Dosen_model->Detail_Inbox($data["nim"],$id);
			$this->Dosen_model->Update_Pesan($id);
			$this->load->view('dosen/bg_atas',$data);
			$this->load->view('dosen/bg_menu');
			$this->load->view('dosen/detail_inbox',$data);
			$this->load->view('dosen/bg_bawah');
			}
					else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function balasinbox()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$datestring = "%d-%m-%Y | %h:%i:%a";
		$time = time();
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="PA"){
				$in["username"]=$this->input->post('username');
				$in["tujuan"]=$this->input->post('tujuan');
				$in["subjek"]=$this->input->post('subjek');
				$in["pesan"]=$this->input->post('pesan');
				$in["waktu"]=mdate($datestring,$time);
				$in["status_pesan"]="N";
				$id=$this->input->post('id_inbox');
				$this->load->model('Dosen_model');
				$this->Dosen_model->Balas_Pesan($in);
				$this->Dosen_model->Update_Pesan_Lama($in["pesan"],$id);
				?>
				<script type="text/javascript" language="javascript">
				alert("Pesan anda sudah terkirim.");
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/inbox'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function hapusinbox()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($status=="PA"){
			$this->load->model('Dosen_model');
			$this->Dosen_model->Delete_Pesan($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen/inbox'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	
//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce($selectcategory=null) {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'jscripts/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "'.base_url().'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';	
	} 	
}








?>
