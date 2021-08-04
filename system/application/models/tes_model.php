<?php
class Tes_model extends Model
	{
		function Tes_model()
		{
			parent::Model();
		}
		function Tampil_Matkul_TI($batas,$ofset)
		{
			$tampil = $this->db->query("select * from tblmatkul order by id_mk ASC LIMIT $ofset,$batas");
			return $tampil;
		}
		function Tampil_Soal($batas,$ofset)
		{
			$tampil = $this->db->query("select * from tblsoal left join tblmatkul on tblsoal.id_matkul=tblmatkul.id_mk group by 
			tblmatkul.nama_mk order by id_soal DESC LIMIT $ofset,$batas");
			return $tampil;
		}
		function Total_Soal()
		{
			$query_total=$this->db->query("select * from tblsoal left join tblmatkul on tblsoal.id_matkul=tblmatkul.id_mk group by 			
			tblmatkul.nama_mk");
			return $query_total;
		}
		function Lihat_Soal($id_mk,$batas,$ofset)
		{
			$tampil = $this->db->query("select * from tblsoal left join tblmatkul on tblsoal.id_matkul=tblmatkul.id_mk where id_matkul='$id_mk'  group by 
			tblsoal.no_soal order by id_soal ASC LIMIT $ofset,$batas");
			return $tampil;
		}
		function Total_Lihat_Soal($id_mk)
		{
			$query_total=$this->db->query("select * from tblsoal left join tblmatkul on tblsoal.id_matkul=tblmatkul.id_mk where 
			id_matkul='$id_mk' group by no_soal");
			return $query_total;
		}
		function Tampilkan_Soal($id_mk,$no_soal)
		{
			$query_total=$this->db->query("select * from tblsoal left join tblmatkul on tblsoal.id_matkul=tblmatkul.id_mk where 
			id_matkul='$id_mk' AND no_soal='$no_soal' order by RAND()");
			return $query_total;
		}
		function Judul_MK($id_mk)
		{
			$matkul=$this->db->query("select * from tblmatkul left join tblsoal on tblmatkul.id_mk=tblsoal.id_matkul  where id_mk='$id_mk' group by nama_mk");
			return $matkul;
		}
		function Hitung_Hasil($id_mk,$no_soal)
		{
			$query=$this->db->query("select * from tblsoal left join tblmatkul on tblsoal.id_matkul=tblmatkul.id_mk where 
			id_matkul='$id_mk' AND no_soal='$no_soal'");
			return $query;
		}
		function Simpan_Hasil($datainput)
		{
			$this->db->insert('tblhasil',$datainput);
		}
		function Validasi_Tes($id_mk,$no_soal,$user)
		{
			$valid=$this->db->query("select * from tblhasil where id_mk='$id_mk' AND no_soal='$no_soal' AND username='$user'");
			return $valid;
		}
		function Lihat_Nilai($username,$limit,$ofset)
		{
			$nilai=$this->db->query("select * from tblhasil left join tblmatkul on tblhasil.id_mk=tblmatkul.id_mk where tblhasil.username='$username' order by nama_mk ASC LIMIT $ofset,$limit");
			return $nilai;
		}
		function Total_Nilai($username)
		{
			$nilai=$this->db->query("select * from tblhasil where tblhasil.username='$username'");
			return $nilai;
		}










	}
