<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbahan extends CI_model
{
	public function tampil_bahan ()
	{
		$ambil = $this->db->get('bahan');
		return $ambil->result_array();
	}

	public function tambah ($inputan)
	{
		$this->db->insert('bahan', $inputan);
	}
	public function detail ($id_bahan)
	{
		$this->db->where('id_bahan', $id_bahan);
		$ambil = $this->db->get('bahan');
		return $ambil->row_array();
	}
	public function ubah ($inputan, $id_bahan)
	{
		$this->db->where('id_bahan', $id_bahan);
		$this->db->update('bahan', $inputan);
	}

	public function hapus ($id_bahan)
	{
		$this->db->where('id_bahan', $id_bahan);
		$this->db->delete('bahan');
	}
}
?>
