<?php

class Learning extends Controller {

	function Learning()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library();
		$this->load->plugin();
		session_start();
	}
	
	function index()
	{
		$data=array();
		$this->load->model('Learning_model');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["slide_berita"] = $this->Learning_model->Slide_Berita();
		$data["tampil_tutorial"] = $this->Learning_model->Tampil_Tutorial();
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		//paging agenda
		$page=$this->uri->segment(4);
      	$limit_agenda=5;
		if(!$page):
		$offset_agenda = 0;
		else:
		$offset = $page;
		endif;	
		
		//paging pengumuman
		$page=$this->uri->segment(5);
      	$limit_pengumuman=4;
		if(!$page):
		$offset_pengumuman = 0;
		else:
		$offset = $page;
		endif;	
		
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru($limit_agenda,$offset_agenda);
		$data["pengumuman"] = $this->Learning_model->Tampil_Pengumuman_Terbaru($limit_pengumuman,$offset_pengumuman);
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/isi_index',$data);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
	}
	function login()
	{
		$username = $this->input->post('usernameteks');
		$pwd = $this->input->post('passwordteks');
		$this->load->model('Learning_model');
		$hasil = $this->Learning_model->Data_Login($username,$pwd);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items){
				$session_username=$items->username."|".$items->nama."|".$items->idlink."|".$items->status;
				$tanda=$items->status;
			}
			$_SESSION['username_belajar']=$session_username;
			if($tanda=="Mahasiswa"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
			else if($tanda=="admin"){
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
			}
			else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen'>";
			}
		}
		else{
			?>
			<script type="text/javascript">
			alert("Username atau Password Yang Anda Masukkan Salah..!!!");			
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}
	function logout()
	{
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
	}
	function detailberita()
	{
		
		$id_berita='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_berita='';
		}
		else
		{
    			$id_berita = $this->uri->segment(3);
		}
		$data=array();
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$this->load->plugin('captcha');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$data["detail"]=$this->Learning_model->Detail_Berita($id_berita);
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->Learning_model->Update_Counter_Berita($id_berita);
		
		//Paging untuk komentar
     		$page=$this->uri->segment(4);
      		$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		//paging agenda
		$page=$this->uri->segment(5);
      		$limit_agenda=5;
		if(!$page):
		$offset_agenda = 0;
		else:
		$offset = $page;
		endif;	
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru($limit_agenda,$offset_agenda);	
        	$data["query"] = $this->Learning_model->Tampil_Komentar_Berita($id_berita,$offset,$limit);
		$tot_hal = $this->Learning_model->Total_Komentar_Berita($id_berita);
      	 	$config['base_url'] = base_url() . '/index.php/learning/detailberita/'.$id_berita;
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
       		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		//paging selesai

		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["acak_berita"] = $this->Learning_model->Berita_Acak($id_berita);

		$captcha_result = '';
    		$data["cap_img"] = $this -> _make_captcha();
    		if ( $this -> input -> post( 'submit' ) ) {
      			if ( $this -> _check_capthca() ) {
        		$captcha_result = 'GOOD';
      			}else {
        		$captcha_result = 'BAD';
      			}
    		}
   		$data["cap_msg"] = $captcha_result;

		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/detail_berita',$data);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
	}

	function detailtutorial()
	{
		
		$id_tutorial='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_tutorial='';
		}
		else
		{
    			$id_tutorial = $this->uri->segment(3);
		}
		$data=array();
		$this->load->model('Learning_model');
		//paging agenda
		$page=$this->uri->segment(4);
      		$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru($limit,$offset);
		$data["detail"]=$this->Learning_model->Detail_Tutorial($id_tutorial);
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->Learning_model->Update_Counter_Tutorial($id_tutorial);
		$data["acak_tutorial"] = $this->Learning_model->Tutorial_Acak($id_tutorial);
		
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/detail_tutorial',$data);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
	}
	function katberita()
	{
		$id_kategori='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_kategori='';
		}
		else
		{
    			$id_kategori = $this->uri->segment(3);
		}
		$data2=array();
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data2["nim"]=$pecah[0];
		$data2["nama"]=$pecah[1];
		}
		$data2["judul_kategori"] = $this->Learning_model->Judul_Kategori_Berita($id_kategori);
		$data2["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data2["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data2["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data2["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data2["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();

     		$page=$this->uri->segment(4);
      		$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	

		//paging agenda
		$page=$this->uri->segment(5);
      		$limit_agenda=5;
		if(!$page):
		$offset_agenda = 0;
		else:
		$offset = $page;
		endif;	
		$data2["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru($limit_agenda,$offset_agenda);
        	$query = $this->Learning_model->Kategori_Berita($id_kategori,$offset,$limit);
		$tot_hal = $this->Learning_model->Total_Berita($id_kategori);
      	 	$config['base_url'] = base_url() . '/index.php/learning/katberita/'.$id_kategori;
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
	    	$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
        	$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();

        	$data = array('query' => $query,'paginator'=>$paginator);
		
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data2);
		$this->load->view('e-learning/bg_kiri',$data2);
		$this->load->view('e-learning/kategori_berita',$data);
		$this->load->view('e-learning/bg_kanan',$data2);
		$this->load->view('e-learning/bg_footer');
	}
	function kattutorial()
	{
		$id_kategori='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_kategori='';
		}
		else
		{
    			$id_kategori = $this->uri->segment(3);
		}
		$data2=array();
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data2["nim"]=$pecah[0];
		$data2["nama"]=$pecah[1];
		}
		$data2["judul_kategori"] = $this->Learning_model->Judul_Kategori_Tutorial($id_kategori);
		$data2["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data2["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data2["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data2["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data2["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();

     		$page=$this->uri->segment(4);
      		$limit=5;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	

		//paging agenda
		$page=$this->uri->segment(5);
      		$limit_agenda=5;
		if(!$page):
		$offset_agenda = 0;
		else:
		$offset = $page;
		endif;	
		$data2["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru($limit_agenda,$offset_agenda);
        	$query = $this->Learning_model->Kategori_Tutorial($id_kategori,$offset,$limit);
		$tot_hal = $this->Learning_model->Total_Tutorial($id_kategori);
      	 	$config['base_url'] = base_url() . '/index.php/learning/kattutorial/'.$id_kategori;
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
	    	$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
        	$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();

        	$data = array('query' => $query,'paginator'=>$paginator);
		
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data2);
		$this->load->view('e-learning/bg_kiri',$data2);
		$this->load->view('e-learning/kategori_tutorial',$data);
		$this->load->view('e-learning/bg_kanan',$data2);
		$this->load->view('e-learning/bg_footer');
	}
	function kirimkomentar()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('komentar','Komentar','required');
		$this->form_validation->set_rules('captcha','Captcha','callback__check_capthca');
		$id_berita=$this->input->post('id_berita');
		$nama_non=$this->input->post('nama');
		$email_non=$this->input->post('email');
		$komentar_non=$this->input->post('komentar');
		$nama=strip_tags($nama_non);
		$email=strip_tags($email_non);
		$komentar=strip_tags($komentar_non);
			$tgl = " %Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
		if ($this->form_validation->run() == FALSE)
		{
			?>
			<script type="text/javascript">
			alert("Inputan tidak Valid!!! Ulangi lagi.");			
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/detailberita/".$id_berita."'>";
		}
		else
		{
			$datainput['id_berita']=$id_berita;
			$datainput['nama']=$nama;
			$datainput['email']=$email;
			$datainput['komentar']=$komentar;
			$datainput['tanggal']=mdate($tgl,$time);;
			$datainput['waktu']=mdate($jam,$time);;
			$this->load->model('Learning_model');
			$this->Learning_model->Simpan_Data($datainput);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/detailberita/".$id_berita."'>";
		}
	}
	function pencarian()
	{
		$kata=$this->input->post('katakunci');
		$tabel=$this->input->post('pencarian');
		$this->load->model('Learning_model');
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		
      		$limit_agenda=5;
		$offset_agenda = 0;

		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$data["pilihan"] = $tabel;
		$data["kata"] = $kata;
		$data["hasil"] = $this->Learning_model->Pencarian($kata,$tabel);
		$data["jumlah"] = $data["hasil"]->num_rows;
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru($limit_agenda,$offset_agenda);
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/hasil_pencarian',$data);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
	}
	function hasilpolling()
	{
		$pilih=$this->input->post('polling');
		$id_soal=$this->input->post('id_soal');
		setcookie("poling", "sudah poling", time() + 3600 * 24);
		if (isset($_COOKIE["poling"])) {
   		?>
			<script type="text/javascript">
				alert("Maaf, anda sudah mengisi polling ini!!! Setiap hari, hanya bisa mengisi satu kali. Silahkan vote kembali besok.");
			</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/lihathasil'>";
 		}
 		else{
		$this->load->model('Learning_model');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$this->Learning_model->Update_Polling($pilih);
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);

      		$limit_agenda=5;
		$offset_agenda = 0;

		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru($limit_agenda,$offset_agenda);
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/hasil_polling',$data);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
		}
		

	}
	function lihathasil()
	{
		$id_soal=$this->input->post('id_soal');
		$this->load->model('Learning_model');
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);

      		$limit_agenda=5;
		$offset_agenda = 0;

		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru($limit_agenda,$offset_agenda);
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/hasil_polling',$data);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');

	}
	function agenda()
	{
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);

		//paging agenda
		$page=$this->uri->segment(3);
      		$limit_agenda=5;
		if(!$page):
		$offset_agenda = 0;
		else:
		$offset_agenda = $page;
		endif;	

		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$tot_hal = $this->Learning_model->Total_Agenda();
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru(5,0);
		$query = $this->Learning_model->Tampil_Agenda_Terbaru($limit_agenda,$offset_agenda);
      	 	$config['base_url'] = base_url() . '/index.php/learning/agenda/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit_agenda;
		$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Sebelumnya';
		$config['prev_link'] = 'Selanjutnya';
        	$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();

        	$data2 = array('query' => $query,'paginator'=>$paginator);

		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/agenda',$data2);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
		
	}
	function pengumuman()
	{
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);

		//paging pengumuman
		$page=$this->uri->segment(3);
      		$limit_umum=10;
		if(!$page):
		$offset_umum = 0;
		else:
		$offset_umum = $page;
		endif;	

		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$tot_hal = $this->Learning_model->Total_Pengumuman();
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru(5,0);
		$query = $this->Learning_model->Tampil_Pengumuman_Terbaru($limit_umum,$offset_umum);
      	 	$config['base_url'] = base_url() . '/index.php/learning/pengumuman/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit_umum;
		$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Sebelumnya';
		$config['prev_link'] = 'Selanjutnya';
        	$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();

        	$data2 = array('query' => $query,'paginator'=>$paginator);

		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/pengumuman',$data2);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
		
	}
	function dosen()
	{
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$page=$this->uri->segment(3);
      	$limit_dosen=50;
		if(!$page):
		$offset_dosen = 0;
		else:
		$offset_dosen = $page;
		endif;
		$data["hal"] = $page;
		
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$tot_hal = $this->Learning_model->Total_Dosen();
		$query = $this->Learning_model->Daftar_Dosen($limit_dosen,$offset_dosen);
      	 	$config['base_url'] = base_url() . '/index.php/learning/dosen/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit_dosen;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
        $this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
		$data2 = array('query' => $query,'paginator'=>$paginator);	
		
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru(5,0);
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/dosen',$data2);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
	}
	function mi()
	{
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$page=$this->uri->segment(3);
      	$limit_ti=35;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$data["hal"] = $page;
		
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$tot_hal = $this->Learning_model->Total_Matkul_MI();
		$query = $this->Learning_model->Matkul_MI($limit_ti,$offset_ti);
      	 	$config['base_url'] = base_url() . '/index.php/learning/mi/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit_ti;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
        $this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
		$data2 = array('query' => $query,'paginator'=>$paginator, 'tot_hal'=>$tot_hal);	
		
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru(5,0);
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/mi',$data2);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
	}
	function ti()
	{
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$page=$this->uri->segment(3);
      	$limit_ti=35;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$data["hal"] = $page;
		
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$tot_hal = $this->Learning_model->Total_Matkul_TI();
		$query = $this->Learning_model->Matkul_TI($limit_ti,$offset_ti);
      	 	$config['base_url'] = base_url() . '/index.php/learning/ti/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit_ti;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
        $this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
		$data2 = array('query' => $query,'paginator'=>$paginator, 'tot_hal'=>$tot_hal);	
		
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru(5,0);
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/ti',$data2);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
	}
	function katdownload()
	{
		$this->load->model('Learning_model');
		$this->load->library('Pagination');
		$id_kat='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_kat='';
		}
		else
		{
    			$id_kat = $this->uri->segment(3);
		}
		$page=$this->uri->segment(4);
      	$limit_down=35;
		if(!$page):
		$offset_down = 0;
		else:
		$offset_down = $page;
		endif;
		$data["hal"] = $page;
		
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		}
		$judul_kat = $this->Learning_model->Judul_Kat_Down($id_kat);
		$tot_hal = $this->Learning_model->Total_Kat_Down($id_kat);
		$query = $this->Learning_model->Kategori_Download($id_kat,$offset_down,$limit_down);
      	 	$config['base_url'] = base_url() . '/index.php/learning/katdownload/'.$id_kat;
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit_down;
			$config['uri_segment'] = 4;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
        $this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
		$data2 = array('query' => $query,'paginator'=>$paginator, 'tot_hal'=>$tot_hal, 'judul_kat'=>$judul_kat);	
		
		$data["soal_polling"] = $this->Learning_model->Tampil_Polling();
		$soal_poll = $data["soal_polling"];
		foreach($soal_poll->result() as $soal)
			{
				$id_soal=$soal->id_soal_poll;
			}
		$data["jawaban_polling"] = $this->Learning_model->Tampil_Soal_Polling($id_soal);
		$data["agenda"] = $this->Learning_model->Tampil_Agenda_Terbaru(5,0);
		$data["kategori_berita"] = $this->Learning_model->Daftar_Kategori_Berita();
		$data["kategori_download"] = $this->Learning_model->Daftar_Kategori_Download();
		$data["kategori_tutorial"] = $this->Learning_model->Daftar_Kategori_Tutorial();
		$data["berita_populer"] = $this->Learning_model->Berita_Populer();
		$data["tutorial_populer"] = $this->Learning_model->Tutorial_Populer();
		$this->load->view('e-learning/bg_header');
		$this->load->view('e-learning/bg_menu',$data);
		$this->load->view('e-learning/bg_kiri',$data);
		$this->load->view('e-learning/kategori_download',$data2);
		$this->load->view('e-learning/bg_kanan',$data);
		$this->load->view('e-learning/bg_footer');
	}
	function updatepassword()
	{
		$username=$this->input->post('username');
		$psw=$this->input->post('pwd');
		$psw_lama=$this->input->post('pwd_lama');
		$this->load->model('Learning_model');
		$hasil = $this->Learning_model->Data_Login($username,$psw_lama);
		if(count($hasil->result()) <= 0)
		{
			?>
			<script type="text/javascript">
				alert('Password lama yang anda masukkan SALAH..!!!');
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/passwordmhs'>";
		}
		else if($psw!="" AND $psw_lama!="")
		{
			$this->Learning_model->Update_Password($username,$psw);
			echo "<font size='2' face='arial'>Sukses memperbarui password.<br> Password anda yang baru : <b>".$psw."</b><br>
			Dengan username : <b>".$username."</b>";
		}
		else
		{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/passwordmhs'>";
		}
	}

	function kirimpesanadmin()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$datestring = "%d-%m-%Y | %h:%i:%a";
		$time = time();
		$input=array();
		$input['username']=$this->input->post('nim');
		$input['subjek']=$this->input->post('subjek');
		$input['tujuan']="admin";
		$input['status_pesan']="N";
		$input['waktu']=mdate($datestring,$time);
		$input['pesan']=$this->input->post('pesan');
		if($input['subjek']=="" AND $input['pesan']==""){
		?>
			<script type="text/javascript">
			alert("Kolom pesan dan subjek belum diisi semua...!!!");			
			</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/pesanadmin'>";
		}
		else{
		$this->load->model('Learning_model');
		$this->Learning_model->Simpan_Pesan_Admin($input);
		echo"<font size='2' face='arial'>Pesan anda telah terkirim ke pihak admin. Tunggu balasan dari kami sesaat lagi.<br><b>Terima kasih</b></font>";
		}
		}
		else{
		?>
			<script type="text/javascript">
			alert("Anda belum Log In...!!!");			
			</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/pesanadmin'>";
		}
		
	}
	function kirimpesandosen()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$datestring = "%d-%m-%Y | %h:%i:%a";
		$time = time();
		$input=array();
		$input['username']=$this->input->post('nim');
		$input['subjek']=$this->input->post('subjek');
		$input['tujuan']=$this->input->post('tujuan');
		$input['status_pesan']="N";
		$input['waktu']=mdate($datestring,$time);
		$input['pesan']=$this->input->post('pesan');
		if($input['subjek']=="" AND $input['pesan']==""){
		?>
			<script type="text/javascript">
			alert("Kolom pesan dan subjek belum diisi semua...!!!");			
			</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/pesandosen'>";
		}
		else{
		$this->load->model('Learning_model');
		$this->Learning_model->Simpan_Pesan_Admin($input);
		echo"<font size='2' face='arial'>Pesan anda telah terkirim ke pihak dosen. Tunggu balasan dari dosen yang bersangkutan sesaat lagi.<br><b>Terima kasih</b></font>";
		}
		}
		else{
		?>
			<script type="text/javascript">
			alert("Anda belum Log In...!!!");			
			</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/pesanadmin'>";
		}
		
	}
		
//==========================================Memakai Highslide Javascript===========================================
	function detailagenda()
	{
		$id_agenda='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_agenda='';
		}
		else
		{
    			$id_agenda = $this->uri->segment(3);
		}
		$this->load->model('Learning_model');
		$data['detail']=$this->Learning_model->Detail_Agenda($id_agenda);
		$this->load->view('e-learning/detail_agenda',$data);
	}
	function detailpengumuman()
	{
		$id_pengumuman='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_pengumuman='';
		}
		else
		{
    			$id_pengumuman = $this->uri->segment(3);
		}
		$this->load->model('Learning_model');
		$data['detail']=$this->Learning_model->Detail_Pengumuman($id_pengumuman);
		$this->load->view('e-learning/detail_pengumuman',$data);
	}
	function passwordmhs()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$this->load->view('e-learning/ganti_password',$data);
		}
		else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}
	function pesanadmin()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$this->load->view('e-learning/pesan_admin',$data);
		}
		else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}
	function pesandosen()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data=array();
		$this->load->model('Learning_model');
		$data["daftar"]=$this->Learning_model->List_Dosen();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$this->load->view('e-learning/pesan_dosen',$data);
		}
		else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}
	function inboxmhs()
	{
		$this->load->model('Learning_model');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data=array();
		$pecah=explode("|",$session);
		$id=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["pesan"]=$this->Learning_model->Inbox_Mhs($id);
		$this->load->view('e-learning/inbox_mhs',$data);
		}
		else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}
	function hapuspesan()
	{
		$this->load->model('Learning_model');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data=array();
		$pecah=explode("|",$session);
		$id=$pecah[0];
		$data["nama"]=$pecah[1];
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data["pesan"]=$this->Learning_model->Delete_Pesan($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/learning/inboxmhs'>";
		}
		else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}
	function detailpesan()
	{
		$this->load->model('Learning_model');
		$user='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$user='';
		}
		else
		{
    			$user = $this->uri->segment(3);
		}
		$id_inbox='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$id_inbox='';
		}
		else
		{
    			$id_inbox = $this->uri->segment(4);
		}
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nama"]=$pecah[1];
		$data["pesan"]=$this->Learning_model->Detail_Pesan($user,$id_inbox);
		$this->Learning_model->Update_Pesan($id_inbox);
		$this->load->view('e-learning/detail_pesan',$data);
		}
		else {
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}
//==============================================================Fungsi Captcha====================================================
  	function _make_captcha()
  	{
		 $this -> load -> plugin( 'captcha' );
		 $vals = array(
     	 	 'img_path' => './captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
   	 	 'img_url' => 'http://localhost/e_learning2/captcha/', // URL for captcha img
    		 'img_width' => 150, // width
   	   	 'img_height' => 50, // height
        	 'expiration' => 7200 ,
  		 );
    		// Create captcha
			 $cap = create_captcha( $vals );
			// Write to DB
			if ( $cap ) {
		 	 $data = array(
				'captcha_id' => '',
				'captcha_time' => $cap['time'],
				'ip_address' => $this -> input -> ip_address(),
				'word' => $cap['word'] ,
				);
		 	 $query = $this -> db -> insert_string( 'captcha', $data );
		 	 $this -> db -> query( $query );
			}else {
			  return "Umm captcha not work" ;
			}
			return $cap['image'] ;
  	}

  	function _check_capthca()
  	{
    	// Delete old data ( 2hours)
    	$expiration = time()-7200 ;
    	$sql = " DELETE FROM captcha WHERE captcha_time < ? ";
    	$binds = array($expiration);
    	$query = $this->db->query($sql, $binds);

    	//checking input
    	$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
    	$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
    	$query = $this->db->query($sql, $binds);
    	$row = $query->row();

  		if ( $row -> count > 0 )
    	{
      		return true;
    	}
    	return false;

  	}
//==============================================================Selesai Fungsi Captcha====================================================

}








?>
