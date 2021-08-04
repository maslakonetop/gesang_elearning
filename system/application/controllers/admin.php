<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date','file'));
		$this->load->database();
		$this->load->plugin();
		session_start();
	}
	
	function index()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/isi_index',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	
	function berita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Berita($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Berita();
      		$config['base_url'] = base_url() . '/index.php/admin/berita';
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
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/berita',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function editberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$page=$this->uri->segment(3);
			$this->load->model('Admin_model');
			$data['det']=$this->Admin_model->Edit_Berita($id);
			$data['kategori']=$this->Admin_model->Kat_Berita();
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function updateberita()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$config['upload_path'] = './system/application/views/e-learning/berita/';
			$config['allowed_types'] ='bmp|gif|jpg|jpeg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '400';
			$config['max_height'] = '300';						
			$this->load->library('upload', $config);
		
			if(empty($_FILES['userfile']['name'])){
				$in["judul_berita"]=$this->input->post('judul');
				$in["isi"]=$this->input->post('isi_tutorial');
				$in["id_berita"]=$this->input->post('id_tutorial');
				$in["id_kategori"]=$this->input->post('kategori');
				$this->Admin_model->Update_Berita($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/berita'>";
				
			}
			else{
				if(!$this->upload->do_upload())
				{
			 	echo $this->upload->display_errors();
				}
				else {
				$in2["judul_berita"]=$this->input->post('judul');
				$in2["isi"]=$this->input->post('isi_tutorial');
				$in2["id_berita"]=$this->input->post('id_tutorial');
				$in2["gambar"]=$_FILES['userfile']['name'];
				$in2["id_kategori"]=$this->input->post('kategori');
				$this->Admin_model->Update_Berita($in2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/berita'>";
				}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function tambahberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$data['kategori']=$this->Admin_model->Kat_Berita();
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function simpanberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$in=array();
			if(empty($_FILES['userfile']['name'])){
			$in['judul_berita']=$this->input->post('judul');
			$in['id_kategori']=$this->input->post('kategori');
			$in['isi']=$this->input->post('isi');
			$in['gambar']="gbr-news.jpg";
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["counter"] = 0;
			$this->Admin_model->Simpan_Berita($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/berita'>";
			}
			else{
			$in['judul_berita']=$this->input->post('judul');
			$in['id_kategori']=$this->input->post('kategori');
			$in['isi']=$this->input->post('isi');
			$in['gambar']=$_FILES['userfile']['name'];
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["counter"] = 0;
			
			$config['upload_path'] = './system/application/views/e-learning/berita/';
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
			$this->Admin_model->Simpan_Berita($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/berita'>";
			}
			}
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function hapusberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Berita($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/berita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function katberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$data['kategori']=$this->Admin_model->Kat_Berita();
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/kat_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function tambahkatberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_kat_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function simpankatberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['nama_kategori']=$this->input->post('nama');
			$this->Admin_model->Simpan_Kat_Berita($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katberita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function editkatberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$data['det']=$this->Admin_model->Edit_Kat_Berita($id);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_kat_berita',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function updatekatberita()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['id_kategori']=$this->input->post('id_kat');
			$in['nama_kategori']=$this->input->post('nama');
			$this->Admin_model->Update_Kat_Berita($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katberita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function hapuskatberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Kat_Berita($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katberita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function komenberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Komen_Berita($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Komen_Berita();
      		$config['base_url'] = base_url() . '/index.php/admin/komenberita';
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
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/komen_berita',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function hapuskomenberita()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Komen_Berita($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/komenberita'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Pengumuman($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Pengumuman();
      		$config['base_url'] = base_url() . '/index.php/admin/pengumuman';
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
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/pengumuman',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($data["status"]=="admin"){
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_pengumuman');
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
			$tgl = " %Y-%m-%d";
			$time = time();
			$in["tanggal"] = mdate($tgl,$time);
			$in["judul_pengumuman"]=$this->input->post('judul');
			$in["isi"]=$this->input->post('isi');
			$in["penulis"]=$nim;
			$this->Admin_model->Simpan_Pengumuman($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/pengumuman'>";

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
		$this->load->model('Admin_model');
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($data["status"]=="admin"){
			$data["det"]=$this->Admin_model->Edit_Pengumuman($id,$data["nim"]);
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_pengumuman',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
				$in["judul_pengumuman"]=$this->input->post('judul');
				$in["isi"]=$this->input->post('isi');
				$in["id_pengumuman"]=$this->input->post('id_pengumuman');
				$in["penulis"]=$nim;
				$this->load->model('Admin_model');
				$this->Admin_model->Update_Pengumuman($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
			$this->Admin_model->Delete_Pengumuman($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/pengumuman'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function agenda()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Agenda($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Agenda();
      		$config['base_url'] = base_url() . '/index.php/admin/agenda';
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
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/agenda',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function tambahagenda()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_agenda',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function simpanagenda()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$tgl = " %Y-%m-%d";
			$time = time();
			$in["tgl_posting"] = mdate($tgl,$time);
			$in["tema_agenda"]=$this->input->post('judul');
			$in["isi"]=strip_tags($this->input->post('isi'));
			$t_mulai=$this->input->post('tgl_mulai');
			$b_mulai=$this->input->post('bln_mulai');
			$y_mulai=$this->input->post('thn_mulai');
			$in["tgl_mulai"]="".$y_mulai."-".$b_mulai."-".$t_mulai."";
			$t_selesai=$this->input->post('tgl_selesai');
			$b_selesai=$this->input->post('bln_selesai');
			$y_selesai=$this->input->post('thn_selesai');
			$in["tgl_selesai"]="".$y_selesai."-".$b_selesai."-".$t_selesai."";
			$in["tempat"]=$this->input->post('tempat');
			$in["jam"]=$this->input->post('jam');
			$in["keterangan"]=strip_tags($this->input->post('keterangan'));
			$this->Admin_model->Simpan_Agenda($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/agenda'>";

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function editagenda()
	{
		$data=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="admin"){
			$id='';		
			if ($this->uri->segment(3) === FALSE)
			{
    			$id='';
			}
			else
			{
    			$id = $this->uri->segment(3);
			}
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->model('Admin_model');
			$data["ed"]=$this->Admin_model->Edit_Agenda($id);
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_agenda',$data);
			$this->load->view('admin/bg_bawah');

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function updateagenda()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$in["id_agenda"]=$this->input->post('id_agenda');
			$in["tema_agenda"]=$this->input->post('judul');
			$in["isi"]=strip_tags($this->input->post('isi'));
			$t_mulai=$this->input->post('tgl_mulai');
			$b_mulai=$this->input->post('bln_mulai');
			$y_mulai=$this->input->post('thn_mulai');
			$in["tgl_mulai"]="".$y_mulai."-".$b_mulai."-".$t_mulai."";
			$t_selesai=$this->input->post('tgl_selesai');
			$b_selesai=$this->input->post('bln_selesai');
			$y_selesai=$this->input->post('thn_selesai');
			$in["tgl_selesai"]="".$y_selesai."-".$b_selesai."-".$t_selesai."";
			$in["tempat"]=$this->input->post('tempat');
			$in["jam"]=$this->input->post('jam');
			$in["keterangan"]=strip_tags($this->input->post('keterangan'));
			$this->Admin_model->Update_Agenda($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/agenda'>";

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	
	function hapusagenda()
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
			if($status=="admin"){
			$this->load->model('Admin_model');
			$this->Admin_model->Delete_Agenda($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/agenda'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_File($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_File();
      		$config['base_url'] = base_url() . '/index.php/admin/upload';
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
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/upload',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$data["kat"]=$this->Admin_model->Kat_Down();
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_upload',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
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
			$this->Admin_model->Simpan_Upload($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/upload'>";
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$data["kategori"]=$this->Admin_model->Edit_Upload($id);
			$data["cur_kat"]=$this->Admin_model->Kat_Down();
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_upload',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
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
				$this->Admin_model->Update_Upload($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/upload'>";
				
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

				$this->Admin_model->Update_Upload($in2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/upload'>";
				}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
			$hapus=$this->Admin_model->Edit_Upload($id);
			foreach($hapus->result() as $t)
			{
				unlink("./system/application/views/e-learning/download/$t->nama_file");
			}
			$this->Admin_model->Delete_Upload($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/upload'>";
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
	function katdownload()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$data['kategori']=$this->Admin_model->Kat_Down();
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/kat_download',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function tambahkatdownload()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_kat_download',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function simpankatdownload()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['nama_kategori_download']=$this->input->post('nama');
			$this->Admin_model->Simpan_Kat_Download($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katdownload'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function editkatdownload()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$data['det']=$this->Admin_model->Edit_Kat_Download($id);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_kat_download',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function updatekatdownload()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['id_kategori_download']=$this->input->post('id_kat');
			$in['nama_kategori_download']=$this->input->post('nama');
			$this->Admin_model->Update_Kat_Download($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katdownload'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function hapuskatdownload()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Kat_Download($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katdownload'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($data["status"]=="admin"){
		$data["tanggal"] = mdate($datestring, $time);
		$this->load->model('Admin_model');
		$this->load->library('Pagination');	
		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$query=$this->Admin_model->Tampil_Tutorial($limit_ti,$offset_ti);
		$tot_hal = $this->Admin_model->Total_Tutorial();
      		$config['base_url'] = base_url() . '/index.php/admin/tutorial';
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
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tutorial',$data_isi);
			$this->load->view('admin/bg_bawah');
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
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$data['kategori']=$this->Admin_model->Kat_Tutorial();
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_tutorial',$data);
			$this->load->view('admin/bg_bawah');

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			if(empty($_FILES['userfile']['name'])){
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["judul_tutorial"]=$this->input->post('judul');
			$in["isi"]=$this->input->post('isi');
			$in["author"]=$nim;
			$in["id_kategori_tutorial"]=$this->input->post('kategori');
			$in["counter"]=0;
			$in["gambar"]="gbr-tutor.jpg";
			$this->Admin_model->Simpan_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/tutorial'>";
			}
			else{
			$in["tanggal"] = mdate($tgl,$time);
			$in["waktu"] = mdate($jam,$time);
			$in["judul_tutorial"]=$this->input->post('judul');
			$in["isi"]=$this->input->post('isi');
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
			$this->Admin_model->Simpan_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/tutorial'>";
			}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$data["kategori"]=$this->Admin_model->Edit_Tutorial($id);
			$data["cur_kat"]=$this->Admin_model->Kat_Tutorial();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_tutorial',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
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
				$this->Admin_model->Update_Tutorial($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/tutorial'>";
				
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
				$this->Admin_model->Update_Tutorial($in2);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/tutorial'>";
				}
			}

			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
			$this->Admin_model->Delete_Tutorial($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/tutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($data["status"]=="admin"){
		$data["tanggal"] = mdate($datestring, $time);
		$this->load->model('Admin_model');
		$this->load->library('Pagination');	
		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$query=$this->Admin_model->Tampil_Inbox($data["nim"],$limit_ti,$offset_ti);
		$tot_hal = $this->Admin_model->Total_Inbox($data["nim"]);
      		$config['base_url'] = base_url() . '/index.php/admin/inbox';
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
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/inbox',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
					else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($data["status"]=="admin"){
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->model('Admin_model');
			$data["detail"]=$this->Admin_model->Detail_Inbox($data["nim"],$id);
			$this->Admin_model->Update_Pesan($id);
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/detail_inbox',$data);
			$this->load->view('admin/bg_bawah');
			}
					else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
				$in["username"]=$this->input->post('username');
				$in["tujuan"]=$this->input->post('tujuan');
				$in["subjek"]=$this->input->post('subjek');
				$in["pesan"]=$this->input->post('pesan');
				$in["waktu"]=mdate($datestring,$time);
				$in["status_pesan"]="N";
				$id=$this->input->post('id_inbox');
				$this->load->model('Admin_model');
				$this->Admin_model->Balas_Pesan($in);
				$this->Admin_model->Update_Pesan_Lama($in["pesan"],$id);
				?>
				<script type="text/javascript" language="javascript">
				alert("Pesan anda sudah terkirim.");
				</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/inbox'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
			if($status=="admin"){
			$this->load->model('Admin_model');
			$this->Admin_model->Delete_Pesan($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/inbox'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function kattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		$page=$this->uri->segment(3);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$data['kategori']=$this->Admin_model->Tampil_Kat_Tutorial($limit_ti,$offset_ti);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/kat_tutorial',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function tambahkattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/tambah_kat_tutorial',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function simpankattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['nama_kategori']=$this->input->post('nama');
			$this->Admin_model->Simpan_Kat_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/kattutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function editkattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$data['det']=$this->Admin_model->Edit_Kat_Tutorial($id);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/edit_kat_tutorial',$data);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function updatekattutorial()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[3];
			if($status=="admin"){
			$this->load->model('Admin_model');
			$in=array();
			$in['id_kategori_tutorial']=$this->input->post('id_kat');
			$in['nama_kategori']=$this->input->post('nama');
			$this->Admin_model->Update_Kat_Tutorial($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/kattutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function hapuskattutorial()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
		if($data["status"]=="admin"){
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('Admin_model');
			$this->Admin_model->Hapus_Kat_Tutorial($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/kattutorial'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
	function polling()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[3];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="admin"){
			$page=$this->uri->segment(3);
      			$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Polling($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Polling();
			foreach($tot_hal->result() as $t)
			{
				$idsoal = $t->id_soal_poll;
			}
			$tot_jwb = $this->Admin_model->Tampil_Jwb_Polling($idsoal);
      			$config['base_url'] = base_url() . '/index.php/admin/polling';
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
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_head',$data);
			$this->load->view('admin/polling',$data_isi);
			$this->load->view('admin/bg_bawah');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
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
