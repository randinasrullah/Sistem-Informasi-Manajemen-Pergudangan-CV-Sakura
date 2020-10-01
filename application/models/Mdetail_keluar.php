<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdetail_keluar extends CI_Model
{
	public function tampil($id_keluar)
	{

		$this->db->join('bahan','detail_keluar.id_bahan = bahan.id_bahan');
		$this->db->where('id_keluar', $id_keluar);
		$ambil = $this->db->get('detail_keluar');
		return $ambil->result_array();
	}
	public function tampil_bahan($id_bahan)
	{
		$this->db->join('keluar', 'keluar.id_keluar = detail_keluar.id_keluar', 'left');
		$this->db->join('admin', 'admin.id_admin = keluar.id_admin', 'left');
		$this->db->join('bahan', 'bahan.id_bahan = detail_keluar.id_bahan', 'left' );
		$this->db->where('detail_keluar.id_bahan', $id_bahan);
		$ambil = $this->db->get('detail_keluar');
		return $ambil->result_array();

	}

	public function tampil_keluar_bahan ($id_bahan, $bulan){
		$this->db->join('keluar', 'detail_keluar.id_keluar = keluar.id_keluar');
		$this->db->join('bahan', 'detail_keluar.id_bahan = bahan.id_bahan');
		$this->db->where('detail_keluar.id_bahan', $id_bahan);
		$this->db->like('tanggal_keluar', $bulan,'BOTH');
		$ambil = $this->db->get('detail_keluar');
		return $ambil->result_array();

	}
	public function hitung_bahan ($id_bahan)
	{
		$ambil = $this->db->query("SELECT SUM(jumlah_detail_keluar) AS jumlah FROM detail_keluar WHERE id_bahan= '$id_bahan'");
		$data = $ambil->row_array();
		return $data['jumlah'];
	}
}

?>