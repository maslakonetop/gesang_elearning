<?php
class Dosen_model extends Model
	{
		function Dosen_model()
		{
			parent::Model();
		}
		function Tampil_Tutorial($username,$limit,$ofset)
		{
			$t=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where 
			author='$username' LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Tutorial($username)
		{
			$t=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where 
			author='$username'");
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
		function Edit_Tutorial($id,$username)
		{
			$ed=$this->db->query("select * from tbltutorial left join tblkategoritutorial on tbltutorial.id_kategori_tutorial=tblkategoritutorial.id_kategori_tutorial where 
			author='$username' and id_tutorial='$id'");
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
		function Tampil_Pengumuman($username,$limit,$ofset)
		{
			$t=$this->db->query("select * from tblpengumuman where penulis='$username' LIMIT $ofset,$limit");
			return $t;
		}
		function Total_Pengumuman($username)
		{
			$t=$this->db->query("select * from tblpengumuman where penulis='$username'");
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
		function Tampil_File($username,$limit,$ofset)
		{
			$t=$this->db->query("select * from tbldownload left join tblkategoridownload on 	
			tbldownload.id_kat=tblkategoridownload.id_kategori_download where 
			author='$username' LIMIT $ofset,$limit");
			return $t;
		}
		function Total_File($username)
		{
			$t=$this->db->query("select * from tbldownload left join tblkategoridownload on 	
			tbldownload.id_kat=tblkategoridownload.id_kategori_download where 
			author='$username'");
			return $t;
		}
		function Kat_Down()
		{
			$kat=$this->db->query("select * from tblkategoridownload");
			return $kat;
		}
		function Simpan_Upload($in)
		{
			$kat=$this->db->insert('tbldownload',$in);
			return $kat;
		}
		function Edit_Upload($id,$username)
		{
			$t=$this->db->query("select * from tbldownload left join tblkategoridownload on 	
			tbldownload.id_kat=tblkategoridownload.id_kategori_download where 
			author='$username' AND id_download='$id'");
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

	}
