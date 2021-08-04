<?php
class Learning_model extends Model
	{
		function Learning_model()
		{
			parent::Model();
		}
	
		function Daftar_Kategori_Berita()
		{
			$query_kategori=$this->db->query("select * from tblkategori");
			return $query_kategori;
		}
		function Daftar_Kategori_Download()
		{
			$query_kategori_download=$this->db->query("select * from tblkategoridownload");
			return $query_kategori_download;
		}
		function Daftar_Kategori_Tutorial()
		{
			$query_kategori_tutorial=$this->db->query("select * from tblkategoritutorial");
			return $query_kategori_tutorial;
		}
		function Slide_Berita()
		{
			$query_berita=$this->db->query("SELECT tblberita.id_berita, tblberita.judul_berita, tblberita.isi, tblberita.gambar, tblberita.waktu, tblberita.tanggal, 
			tblkategori.nama_kategori from tblberita left outer join tblkategori on tblberita.id_kategori=tblkategori.id_kategori order by id_berita DESC LIMIT 10");
			return $query_berita;
		}
		function Tampil_Tutorial()
		{
			$query_tutorial=$this->db->query("SELECT tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.isi, tbltutorial.gambar, tbltutorial.waktu, tbltutorial.tanggal, tblkategoritutorial.nama_kategori from tbltutorial left outer join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial order by id_tutorial DESC LIMIT 4");
			return $query_tutorial;

		}
		function Detail_Berita($id_berita)
		{
			$query_detail_berita=$this->db->query("SELECT tblberita.counter, tblberita.id_berita, tblberita.judul_berita, tblberita.isi, tblberita.gambar, tblberita.waktu, tblberita.tanggal, tblkategori.id_kategori, tblkategori.nama_kategori from tblberita left outer join tblkategori on tblberita.id_kategori=tblkategori.id_kategori where id_berita='$id_berita'");
			return $query_detail_berita;
		}
		function Total_Komentar_Berita($id_berita)
		{
			$query_detail_berita=$this->db->query("SELECT tblberita.judul_berita, tblkomentarberita.id_komen_berita, tblkomentarberita.nama, tblkomentarberita.email, tblkomentarberita.komentar, tblkomentarberita.tanggal, tblkomentarberita.waktu from tblberita left outer join tblkomentarberita on 					tblberita.id_berita=tblkomentarberita.id_berita where tblberita.id_berita='$id_berita'");
			return $query_detail_berita;
		}
		function Tampil_Komentar_Berita($id_berita,$ofset,$batas)
		{
			$query_tampil=$this->db->query("SELECT tblberita.judul_berita, tblkomentarberita.id_komen_berita, tblkomentarberita.nama, tblkomentarberita.email, tblkomentarberita.komentar, tblkomentarberita.tanggal, tblkomentarberita.waktu from tblberita left outer join tblkomentarberita on 				tblberita.id_berita=tblkomentarberita.id_berita where tblberita.id_berita='$id_berita' order by id_komen_berita DESC LIMIT $ofset,$batas");
			return $query_tampil;
		}
		function Detail_Tutorial($id_tutorial)
		{
			$query_detail_tutorial=$this->db->query("SELECT tbltutorial.author, tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.isi, tbltutorial.gambar, tbltutorial.waktu, tbltutorial.tanggal, tblkategoritutorial.nama_kategori, tblkategoritutorial.id_kategori_tutorial, tbltutorial.counter from tbltutorial left outer join
			tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where id_tutorial='$id_tutorial'");
			return $query_detail_tutorial;
		}
		function Kategori_Berita($id_kategori,$ofset,$batas)
		{
			$query_kat_berita=$this->db->query("SELECT tblberita.id_berita, tblberita.judul_berita, tblberita.isi, tblberita.gambar, 
			tblberita.waktu, tblberita.tanggal, tblkategori.nama_kategori from tblberita left outer join tblkategori on 
			tblberita.id_kategori=tblkategori.id_kategori where tblberita.id_kategori='$id_kategori' order by id_berita DESC LIMIT $ofset,$batas");
			return $query_kat_berita;
		}
		function Total_Berita($id_kategori)
		{
			$query_kat_berita=$this->db->query("SELECT tblberita.id_berita, tblberita.judul_berita, tblberita.isi, tblberita.gambar, 
			tblberita.waktu, tblberita.tanggal, tblkategori.nama_kategori from tblberita left outer join tblkategori on 
			tblberita.id_kategori=tblkategori.id_kategori where tblberita.id_kategori='$id_kategori' order by id_berita DESC");
			return $query_kat_berita;
		}
		function Kategori_Tutorial($id_kategori,$ofset,$batas)
		{
			$query_kat_tutorial=$this->db->query("SELECT tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.isi, 
			tbltutorial.gambar, tbltutorial.waktu, tbltutorial.tanggal, tblkategoritutorial.nama_kategori from tbltutorial left outer join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where tbltutorial.id_kategori_tutorial='$id_kategori' order by id_tutorial DESC LIMIT $ofset,$batas");
			return $query_kat_tutorial;
		}
		function Total_Tutorial($id_kategori)
		{
			$query_kat_tutorial=$this->db->query("SELECT tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.isi, 
			tbltutorial.gambar, tbltutorial.waktu, tbltutorial.tanggal, tblkategoritutorial.nama_kategori from tbltutorial left outer join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where tbltutorial.id_kategori_tutorial='$id_kategori' order by id_tutorial DESC");
			return $query_kat_tutorial;
		}
		function Berita_Acak($id_berita)
		{
			$query_berita=$this->db->query("SELECT * from tblberita where id_berita!='$id_berita' order by RAND() LIMIT 5");
			return $query_berita;
		}
		function Tutorial_Acak($id_tutorial)
		{
			$query_tutorial=$this->db->query("SELECT * from tbltutorial where id_tutorial!='$id_tutorial' order by RAND() LIMIT 5");
			return $query_tutorial;
		}
		function Tampil_Polling()
		{
			$query_poll=$this->db->query("select * from tblsoalpolling where status='Y'");
			return $query_poll;
		}
		function Tampil_Soal_Polling($id_soal)
		{
			$query_soal=$this->db->query("select * from tbljawabanpoll where id_soal_poll='$id_soal'");
			return $query_soal;
		}
		function Update_Counter_Berita($id_berita)
		{
			$query_update=$this->db->query("update tblberita set counter=counter+1 where id_berita='$id_berita'");
			return $query_update;
		}
		function Berita_Populer()
		{
			$query_populer=$this->db->query("select tblberita.id_berita, tblberita.judul_berita, tblberita.counter from tblberita 
			order by counter
			DESC limit 6");
			return $query_populer;
		}
		function Update_Counter_Tutorial($id_tutorial)
		{
			$query_update=$this->db->query("update tbltutorial set counter=counter+1 where id_tutorial='$id_tutorial'");
			return $query_update;
		}
		function Tutorial_Populer()
		{
			$query_populer=$this->db->query("select tbltutorial.id_tutorial, tbltutorial.judul_tutorial, tbltutorial.counter from 
			tbltutorial order by counter DESC limit 5");
			return $query_populer;
		}
		function Simpan_Data($datainput)
		{
			$this->db->insert('tblkomentarberita',$datainput);
		} 
		function Judul_Kategori_Berita($id_kategori)
		{
			$query_kategori=$this->db->query("select * from tblkategori where id_kategori='$id_kategori'");
			return $query_kategori;
		}
		function Judul_Kategori_Tutorial($id_kategori)
		{
			$query_kategori=$this->db->query("select * from tblkategoritutorial where id_kategori_tutorial='$id_kategori'");
			return $query_kategori;
		}
		function Tampil_Agenda_Terbaru($batas,$ofset)
		{
			$query_agenda=$this->db->query("select * from tblagenda order by id_agenda DESC LIMIT $ofset,$batas");
			return $query_agenda;
		}
		function Total_Agenda()
		{
			$query_total=$this->db->query("select * from tblagenda");
			return $query_total;
		}
		function Detail_Agenda($id_agenda)
		{
			$query_detail=$this->db->query("select * from tblagenda where id_agenda='$id_agenda'");
			return $query_detail;
		}
		function Tampil_Pengumuman_Terbaru($batas,$ofset)
		{
			$query_pengumuman=$this->db->query("select * from tblpengumuman left join tbllogin on tblpengumuman.penulis=tbllogin.username order by id_pengumuman DESC LIMIT $ofset,$batas");
			return $query_pengumuman;
		}
		function Total_Pengumuman()
		{
			$query_total=$this->db->query("select * from tblpengumuman");
			return $query_total;
		}
		function Detail_Pengumuman($id_pengumuman)
		{
			$query_pengumuman=$this->db->query("select * from tblpengumuman left join tbllogin on tblpengumuman.penulis=tbllogin.username where id_pengumuman='$id_pengumuman'");
			return $query_pengumuman;
		}
		function Pencarian($kata_kunci,$tabel)
		{
			$query_cari=$this->db->query("select * from $tabel where isi like '%$kata_kunci%'");
			return $query_cari;
		}
		function Update_Polling($id_poll)
		{
			$query_update=$this->db->query("update tbljawabanpoll set counter=counter+1 where id_jawaban_poll='$id_poll'");
			return $query_update;
		}
		function Daftar_Dosen($batas,$ofset)
		{
			$query_dosen=$this->db->query("select * from tbldosen order by id_dosen ASC LIMIT $ofset,$batas");
			return $query_dosen;
		}
		function Total_Dosen()
		{
			$query_jumlah=$this->db->query("select * from tbldosen");
			return $query_jumlah;
		}
		function Matkul_MI($batas,$ofset)
		{
			$query_matkul=$this->db->query("select * from tblmatkul left join tbldosen on tblmatkul.id_dosen=tbldosen.id_dosen  where tblmatkul.prodi='MI' order by tblmatkul.semester ASC LIMIT $ofset,$batas");
			return $query_matkul;
		}
		function Total_Matkul_MI()
		{
			$query_total=$this->db->query("select * from tblmatkul where prodi='MI'");
			return $query_total;
		}
		function Matkul_TI($batas,$ofset)
		{
			$query_matkul=$this->db->query("select * from tblmatkul left join tbldosen on tblmatkul.id_dosen=tbldosen.id_dosen  where tblmatkul.prodi='TI' order by tblmatkul.semester ASC LIMIT $ofset,$batas");
			return $query_matkul;
		}
		function Total_Matkul_TI()
		{
			$query_total=$this->db->query("select * from tblmatkul where prodi='TI'");
			return $query_total;
		}
		function Kategori_Download($id_kat,$ofset,$batas)
		{
			$query_kat=$this->db->query("select * from tbldownload where tbldownload.id_kat='$id_kat' order by tbldownload.id_download DESC LIMIT $ofset,$batas");
			return $query_kat;
		}
		function Total_Kat_Down($id_kat)
		{
			$query_total=$this->db->query("select * from tbldownload where id_kat='$id_kat'");
			return $query_total;
		}
		function Judul_Kat_Down($id_kat)
		{
			$query_kategori=$this->db->query("select * from tblkategoridownload where id_kategori_download='$id_kat'");
			return $query_kategori;
		}
		function Data_Login($user,$pass)
		{
			$user_bersih=mysql_real_escape_string($user);
			$pass_bersih=mysql_real_escape_string($pass);
			$query=$this->db->query("select * from tbllogin where username='$user_bersih' and psw=PASSWORD('$pass_bersih')");
			return $query;
		}
		function Update_Password($nim,$pwd)
		{
			$this->db->query("update tbllogin set psw=PASSWORD('$pwd') where username='$nim'");
		}
		function Simpan_Pesan_Admin($input)
		{
			$this->db->insert('tblinbox',$input);
		}
		function Simpan_Pesan_Dosen($input)
		{
			$this->db->insert('tblinbox',$input);
		}
		function Inbox_Mhs($id_milik)
		{
			$inbox=$this->db->query("select * from tblinbox left join tbllogin on tblinbox.username=tbllogin.username where tujuan='$id_milik'");
			return $inbox;
		}
		function List_Dosen()
		{
			$daftar=$this->db->query("select * from tbllogin where status='PA'");
			return $daftar;
		}
		function Detail_Pesan($user,$id_inbox)
		{
			$mentah=base64_decode($id_inbox);
			$pecah=explode("9002",$mentah);
			$id=$pecah[1];
			$daftar=$this->db->query("select * from tblinbox left join tbllogin on tblinbox.username=tbllogin.username where tblinbox.username='$user' and id_inbox='$id'");
			return $daftar;
		}
		function Update_Pesan($id_inbox)
		{
			$mentah=base64_decode($id_inbox);
			$pecah=explode("9002",$mentah);
			$id=$pecah[1];
			$this->db->query("update tblinbox set status_pesan='Y' where id_inbox='$id'");
		}
		function Delete_Pesan($id_in)
		{
			$mentah=base64_decode($id_in);
			$pecah=explode("9002",$mentah);
			$id=$pecah[1];
			$this->db->where('id_inbox',$id);
			$this->db->delete('tblinbox');
		}





	}
?>
