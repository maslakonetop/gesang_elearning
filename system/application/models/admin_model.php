<?php
class Admin_model extends Model
	{
		function Admin_model()
		{
			parent::Model();
		}
		function Tampil_Berita($limit,$ofset)
		{
			$t=$this->db->query("select * from tblberita left join tblkategori 
			on tblberita.id_kategori=tblkategori.id_kategori order by id_berita DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Berita()
		{
			$t=$this->db->query("select * from tblberita");
			return $t;
		}
		function Edit_Berita($id)
		{
			$t=$this->db->query("select * from tblberita left join tblkategori on tblberita.id_kategori=tblkategori.id_kategori where id_berita='$id'");
			return $t;
		}
		function Kat_Berita()
		{
			$kat=$this->db->query("select * from tblkategori order by id_kategori DESC");
			return $kat;
		}
		function Update_Berita($in)
		{
			$this->db->where('id_berita',$in['id_berita']);
			$this->db->update('tblberita',$in);
		}
		function Simpan_Berita($in)
		{
			$kat=$this->db->insert('tblberita',$in);
			return $kat;
		}
		function Hapus_Berita($id)
		{
			$this->db->where('id_berita',$id);
			$this->db->delete('tblberita');
		}
		function Simpan_Kat_Berita($in)
		{
			$kat=$this->db->insert('tblkategori',$in);
			return $kat;
		}
		function Edit_Kat_Berita($id)
		{
			$t=$this->db->query("select * from tblkategori where id_kategori='$id'");
			return $t;
		}
		function Update_Kat_Berita($in)
		{
			$this->db->where('id_kategori',$in['id_kategori']);
			$this->db->update('tblkategori',$in);
		}
		function Hapus_Kat_Berita($id)
		{
			$this->db->where('id_kategori',$id);
			$this->db->delete('tblkategori');
		}
		function Komen_Berita($limit,$ofset)
		{
			$t=$this->db->query("select * from tblkomentarberita left join tblberita
			on tblkomentarberita.id_berita=tblberita.id_berita order by id_komen_berita DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Komen_Berita()
		{
			$t=$this->db->query("select * from tblkomentarberita");
			return $t;
		}
		function Hapus_Komen_Berita($id)
		{
			$this->db->where('id_komen_berita',$id);
			$this->db->delete('tblkomentarberita');
		}
		
		function Tampil_Pengumuman($limit,$ofset)
		{
			$t=$this->db->query("select * from tblpengumuman order by id_pengumuman DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Pengumuman()
		{
			$t=$this->db->query("select * from tblpengumuman");
			return $t;
		}
		function Simpan_Pengumuman($in)
		{
			$kat=$this->db->insert('tblpengumuman',$in);
			return $kat;
		}
		function Edit_Pengumuman($id,$username)
		{
			$ed=$this->db->query("select * from tblpengumuman where penulis='$username' and id_pengumuman='$id'");
			return $ed;
		}
		function Update_Pengumuman($in)
		{
			$this->db->where('id_pengumuman',$in['id_pengumuman']);
			$this->db->update('tblpengumuman',$in);
		}
		function Delete_Pengumuman($id)
		{
			$this->db->where('id_pengumuman',$id);
			$this->db->delete('tblpengumuman');
		}
		function Tampil_Agenda($limit,$offset)
		{
			$ta=$this->db->query("select * from tblagenda order by id_agenda DESC LIMIT $offset,$limit");
			return $ta;
		}
		function Total_Agenda()
		{
			$ta=$this->db->query("select * from tblagenda");
			return $ta;
		}
		function Simpan_Agenda($in)
		{
			$kat=$this->db->insert('tblagenda',$in);
			return $kat;
		}
		function Edit_Agenda($id)
		{
			$ed=$this->db->query("select * from tblagenda where id_agenda='$id'");
			return $ed;
		}
		function Update_Agenda($in)
		{
			$this->db->where('id_agenda',$in['id_agenda']);
			$this->db->update('tblagenda',$in);
		}
		function Delete_Agenda($id)
		{
			$this->db->where('id_agenda',$id);
			$this->db->delete('tblagenda');
		}
		function Tampil_File($limit,$ofset)
		{
			$t=$this->db->query("select * from tbldownload left join tblkategoridownload on 	
			tbldownload.id_kat=tblkategoridownload.id_kategori_download order by id_download DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Total_File()
		{
			$t=$this->db->query("select * from tbldownload left join tblkategoridownload on 	
			tbldownload.id_kat=tblkategoridownload.id_kategori_download");
			return $t;
		}
		function Kat_Down()
		{
			$kat=$this->db->query("select * from tblkategoridownload order by id_kategori_download DESC");
			return $kat;
		}
		function Simpan_Upload($in)
		{
			$kat=$this->db->insert('tbldownload',$in);
			return $kat;
		}
		function Edit_Upload($id)
		{
			$t=$this->db->query("select * from tbldownload left join tblkategoridownload on 	
			tbldownload.id_kat=tblkategoridownload.id_kategori_download where id_download='$id'");
			return $t;
		}
		function Update_Upload($in)
		{
			$this->db->where('id_download',$in['id_download']);
			$this->db->update('tbldownload',$in);
		}
		function Delete_Upload($id)
		{
			$this->db->where('id_download',$id);
			$this->db->delete('tbldownload');
		}
		function Simpan_Kat_Download($in)
		{
			$kat=$this->db->insert('tblkategoridownload',$in);
			return $kat;
		}
		function Edit_Kat_Download($id)
		{
			$t=$this->db->query("select * from tblkategoridownload where id_kategori_download='$id'");
			return $t;
		}
		function Update_Kat_Download($in)
		{
			$this->db->where('id_kategori_download',$in['id_kategori_download']);
			$this->db->update('tblkategoridownload',$in);
		}
		function Hapus_Kat_Download($id)
		{
			$this->db->where('id_kategori_download',$id);
			$this->db->delete('tblkategoridownload');
		}
		function Tampil_Tutorial($limit,$ofset)
		{
			$t=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial order by id_tutorial DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Tutorial()
		{
			$t=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial");
			return $t;
		}
		function Kat_Tutorial()
		{
			$kat=$this->db->query("select * from tblkategoritutorial");
			return $kat;
		}
		function Simpan_Tutorial($in)
		{
			$kat=$this->db->insert('tbltutorial',$in);
			return $kat;
		}
		function Edit_Tutorial($id)
		{
			$ed=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where 				id_tutorial='$id'");
			return $ed;
		}
		function Update_Tutorial($in)
		{
			$this->db->where('id_tutorial',$in['id_tutorial']);
			$this->db->update('tbltutorial',$in);
		}
		function Delete_Tutorial($id)
		{
			$this->db->where('id_tutorial',$id);
			$this->db->delete('tbltutorial');
		}
		function Tampil_Kat_Tutorial($limit,$ofset)
		{
			$t=$this->db->query("select * from tblkategoritutorial order by id_kategori_tutorial DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Simpan_Kat_Tutorial($in)
		{
			$kat=$this->db->insert('tblkategoritutorial',$in);
			return $kat;
		}
		function Edit_Kat_Tutorial($id)
		{
			$t=$this->db->query("select * from tblkategoritutorial where id_kategori_tutorial='$id'");
			return $t;
		}
		function Update_Kat_Tutorial($in)
		{
			$this->db->where('id_kategori_tutorial',$in['id_kategori_tutorial']);
			$this->db->update('tblkategoritutorial',$in);
		}
		function Hapus_Kat_Tutorial($id)
		{
			$this->db->where('id_kategori_tutorial',$id);
			$this->db->delete('tblkategoritutorial');
		}
		function Tampil_Inbox($user,$limit,$ofset)
		{
			$t=$this->db->query("select * from tblinbox left join tbllogin on tblinbox.username=tbllogin.username where 
			tujuan='$user' order by id_inbox DESC LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Inbox($user)
		{
			$t=$this->db->query("select * from tblinbox left join tbllogin on tblinbox.username=tbllogin.username where 
			tujuan='$user'");
			return $t;
		}
		function Detail_Inbox($user,$id)
		{
			$mentah=base64_decode($id);
			$pecah=explode("9002",$mentah);
			$id2=$pecah[1];
			$t=$this->db->query("select * from tblinbox left join tbllogin on tblinbox.username=tbllogin.username where 
			tujuan='$user' AND id_inbox='$id2'");
			return $t;
		}
		function Update_Pesan($id_inbox)
		{
			$mentah=base64_decode($id_inbox);
			$pecah=explode("9002",$mentah);
			$id=$pecah[1];
			$this->db->query("update tblinbox set status_pesan='Y' where id_inbox='$id'");
		}
		function Balas_Pesan($in)
		{
			$kat=$this->db->insert('tblinbox',$in);
			return $kat;
		}
		function Update_Pesan_Lama($pesan,$id)
		{
		$u=$this->db->query("update tblinbox set pesan='$pesan' where id_inbox='$id'");
		return $u;
		}
		function Delete_Pesan($id_in)
		{
			$mentah=base64_decode($id_in);
			$pecah=explode("9002",$mentah);
			$id=$pecah[1];
			$this->db->where('id_inbox',$id);
			$this->db->delete('tblinbox');
		}
		function Polling($limit,$offset)
		{
			$query_poll=$this->db->query("select * from tblsoalpolling LIMIT $offset,$limit");
			return $query_poll;
		}
		function Total_Polling()
		{
			$query_poll=$this->db->query("select * from tblsoalpolling");
			return $query_poll;
		}
		function Tampil_Jwb_Polling($id_soal)
		{
			$query_soal=$this->db->query("select * from tbljawabanpoll where id_soal_poll='$id_soal'");
			return $query_soal;
		}

	}
