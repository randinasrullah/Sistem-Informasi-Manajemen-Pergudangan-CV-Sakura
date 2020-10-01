<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model
{
	public function tampil_admin ()
	{
		$ambil = $this->db->get('admin');
		return $ambil->result_array();
	}
	public function tambah($inputan)
	{	
		$inputan['password_admin']=md5($inputan['password_admin']);
		$this->db->insert('admin', $inputan);
	}
	public function detail($id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		$ambil = $this->db->get('admin');
		return $ambil->row_array();
	}

	public function ubah($inputan, $id_admin)
	{
		$inputan['password_admin']=md5($inputan['password_admin']);
		$this->db->where('id_admin',$id_admin);
		$this->db->update('admin', $inputan);
	}
	public function hapus ($id_admin)
	{
		$this->db->where('id_admin',$id_admin);
		$this->db->delete('admin');
	}
}

?>
