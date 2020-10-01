<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpemasok extends CI_Model
{
	public function tampil_pemasok ()
	{
		$ambil = $this->db->get('pemasok');
		return $ambil->result_array();
	}
	
	public function tambah ($inputan)
	{
		$this->db->insert('pemasok', $inputan);
	}
	public function detail($id_pemasok)
	{
		$this->db->where('id_pemasok', $id_pemasok);
		$ambil = $this->db->get('pemasok');
		return $ambil->row_array();
	}

	public function ubah($inputan, $id_pemasok)
	{
		$this->db->where('id_pemasok',$id_pemasok);
		$this->db->update('pemasok', $inputan);
	}
	public function hapus ($id_pemasok)
	{
		$this->db->where('id_pemasok',$id_pemasok);
		$this->db->delete('pemasok');
	}
}

?>