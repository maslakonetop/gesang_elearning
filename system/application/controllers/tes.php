<?php
class Tes extends Controller {

	function Tes()
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
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nama"]=$pecah[1];
		}
		$data["tanggal"] = mdate($datestring, $time);
		$this->load->view('tes/bg_atas',$data);
		$this->load->view('tes/isi_index',$data);
		$this->load->view('tes/bg_menu',$data);
		$this->load->view('tes/bg_bawah',$data);
	}
	function katalogsoal()
	{
		$this->load->model('Tes_model');
		$this->load->library('Pagination');		
		$page=$this->uri->segment(3);
      	$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data_atas = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data_atas["nama"]=$pecah[1];
		}
		$data_atas["tanggal"] = mdate($datestring, $time);
		$query=$this->Tes_model->Tampil_Soal($limit_ti,$offset_ti);
		$total_soal = $query->num_rows();
		$tot_hal = $this->Tes_model->Total_Soal();
      	$config['base_url'] = base_url() . '/index.php/tes/katalogsoal';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit_ti;
		$config['uri_segment'] = 3;
	    $config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
        $this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();

        $data = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
		$this->load->view('tes/bg_atas',$data_atas);
		$this->load->view('tes/kat_soal',$data);
		$this->load->view('tes/bg_menu',$data);
		$this->load->view('tes/bg_bawah',$data);
	}
	function lihatsoal()
	{
		$this->load->model('Tes_model');
		$this->load->library('Pagination');	
		$page=$this->uri->segment(4);
      		$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data_atas = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data_atas["nama"]=$pecah[1];
		}
		$data_atas["tanggal"] = mdate($datestring, $time);
		
		$id_mk='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_mk='';
		}
		else
		{
    			$id_mk = $this->uri->segment(3);
		}
		$query=$this->Tes_model->Lihat_Soal($id_mk,$limit_ti,$offset_ti);
		$judul=$this->Tes_model->Judul_MK($id_mk);
		$tot_hal = $this->Tes_model->Total_Lihat_Soal($id_mk);
      		$config['base_url'] = base_url() . '/index.php/tes/lihatsoal/'.$id_mk;
        	$config['total_rows'] = $tot_hal->num_rows();
       		$config['per_page'] = $limit_ti;
		$config['uri_segment'] = 4;
	   	$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
        	$this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();
		
        	$data = array('query' => $query,'paginator'=>$paginator,'judul'=>$judul, 'page'=>$page);
		$this->load->view('tes/bg_atas',$data_atas);
		$this->load->view('tes/lihat_soal',$data);
		$this->load->view('tes/bg_menu',$data);
		$this->load->view('tes/bg_bawah',$data);
	}
	function ikutites()
	{
		$this->load->model('Tes_model');
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data_atas = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$data_atas["nama"]=$pecah[1];
		}
		$data_atas["tanggal"] = mdate($datestring, $time);
		
		$id_mk='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_mk='';
		}
		else
		{
    			$id_mk = $this->uri->segment(3);
		}
		$no_soal='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$no_soal='';
		}
		else
		{
    			$no_soal = $this->uri->segment(4);
		}
		$data = array();
		$data["username"]=$nim;
		$lempar=$this->Tes_model->Validasi_Tes($id_mk,$no_soal,$nim);
		foreach($lempar->result_array() as $item)
		{
			if($item["no_soal"]==$no_soal)
			{
			?>
			<script type="text/javascript" language="javascript">
		alert("<?php echo $data_atas["nama"]; ?>, anda telah mengikuti tes soal online mata kuliah ini");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/tes/katalogsoal'>";
			}
		}
		$data["judul"]=$this->Tes_model->Judul_MK($id_mk);
		$data["soal"] = $this->Tes_model->Tampilkan_Soal($id_mk,$no_soal);
		$data["jumlah"] = $data["soal"]->num_rows;
		$this->load->view('tes/bg_atas',$data_atas);
		$this->load->view('tes/mulai_tes',$data);
		$this->load->view('tes/bg_menu',$data);
		$this->load->view('tes/bg_bawah',$data);
		
	}

	function hasiltes()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data_atas = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data_atas["nim"]=$pecah[0];
		$data_atas["nama"]=$pecah[1];
		}
		$nama=$data_atas["nama"];
		$data_atas["tanggal"] = mdate($datestring, $time);
		$data=array();
		$jumlah = $this->input->post('banyak_soal');
		$jawaban= $this->input->post('pilih');
		$matkul = $this->input->post('matkul');
		$id_mk = $this->input->post('id_mk');
		$no_soal = $this->input->post('no_soal');
		$this->load->model('Tes_model');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$username=$pecah[0];
		}
		$query=$this->Tes_model->Hitung_Hasil($id_mk,$no_soal);
		$data["hit_hasil"]=$query;
		$benar=0;
		$salah=0;
		foreach($query->result() as $hasil)
		{
			$jwb=$jawaban;
			$id=$hasil->id_soal;
			if($jwb[$id]==$hasil->kunci)
			{
				$benar++;
			}
			else {
				$salah++;
			}
		}
		$nilai=sprintf("%2.1f",$benar/$jumlah*100);
		if($nilai<60){
			$pesan="Belajarlah lebih baik lagi, sehingga bisa sukses di kemudian hari.";
		}
		else{
			$pesan="Selamat dan tingkatkan lagi.";
		}
		$datainput=array();
		$datainput["id_mk"]=$this->input->post('id_mk');
		$datainput["no_soal"]=$this->input->post('no_soal');
		$datainput["username"]=$data_atas["nim"];
		$datainput["salah"]=$salah;
		$datainput["benar"]=$benar;
		$datainput["hasil"]=$nilai;
		if ($id_mk=="" AND $no_soal==""){
			echo "Ouuuppppzzzz,,,soalnya belum dikerjakan boz!!!!";
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/tes/katalogsoal'>";
		}
		else{
			$this->Tes_model->Simpan_Hasil($datainput);
		?>
		<script type="text/javascript" language="javascript">
		alert("<?php echo $data_atas["nama"]; ?> telah mengikuti tes soal online <?php echo $matkul; ?>\n- Dengan total jawaban benar <?php echo $benar; ?> dan total jawaban salah <?php echo $salah; ?>.\n- Anda memperoleh nilai <?php echo $nilai; ?>\n- Pesan : <?php echo $pesan; ?>");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/tes/katalogsoal'>";
		}
	}
	function lihatnilai()
	{	
		$page=$this->uri->segment(3);
      	$limit_ti=15;
		if(!$page):
		$offset_ti = 0;
		else:
		$offset_ti = $page;
		endif;
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data=array();
		$tanggal = mdate($datestring, $time);
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$username=$pecah[0];
		$nim=$username;
		$nama=$pecah[1];
		$this->load->model('Tes_model');
		$this->load->library('Pagination');	
		$query=$this->Tes_model->Lihat_Nilai($username,$limit_ti,$offset_ti);
		
		$tot_hal = $this->Tes_model->Total_Nilai($username);
      	$config['base_url'] = base_url() . '/index.php/tes/lihatnilai';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit_ti;
		$config['uri_segment'] = 3;
	    $config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
        $this->pagination->initialize($config);
		$paginator=$this->pagination->create_links();

        $data = array('query' => $query,'paginator'=>$paginator, 'page'=>$page, 'nim'=>$nim, 'nama'=>$nama, 'tanggal'=>$tanggal);
		$this->load->view('tes/bg_atas',$data);
		$this->load->view('tes/lihat_nilai',$data);
		$this->load->view('tes/bg_menu',$data);
		$this->load->view('tes/bg_bawah',$data);
		}
		else{
		?>
		<script type="text/javascript" language="javascript">
		alert("Anda belum Log In. Silahkan Log In dulu untuk mengakses halaman ini.");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/tes/katalogsoal'>";
		}
	}











}

?>
