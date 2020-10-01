<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdetail_produksi extends CI_Model
{
	public function tampil ($id_produksi)
	{
		$this->db->join('bahan', 'detail_produksi.id_bahan = bahan.id_bahan');
		$this->db->where('id_produksi', $id_produksi);
		$ambil = $this->db->get('detail_produksi');
		return $ambil->result_array();
	}
}

?>