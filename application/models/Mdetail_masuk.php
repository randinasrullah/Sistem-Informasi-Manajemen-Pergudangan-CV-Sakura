<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdetail_masuk extends CI_Model
{
	public function tampil ($id_masuk)
	{	
		$this->db->join('pemasok', 'detail_masuk.id_pemasok = pemasok.id_pemasok');
		$this->db->join('bahan', 'detail_masuk.id_bahan = bahan.id_bahan');
		$this->db->join('masuk', 'masuk.id_masuk = detail_masuk.id_masuk', 'left');
		// $this->db->join('admin', 'admin.id_admin = masuk.id_admin');
		// $this->db->where('id_masuk', $id_masuk);
		$this->db->where('detail_masuk.id_masuk', $id_masuk);
		$ambil = $this->db->get('detail_masuk');
		return $ambil->result_array();
	}

	// public function tampil_tanggal ($id_masuk)
	// {	
	// 	$this->db->join('masuk', 'masuk.id_masuk = detail_masuk.id_masuk');
	// 	$this->db->join('pemasok', 'detail_masuk.id_pemasok = pemasok.id_pemasok');
	// 	$this->db->join('bahan', 'detail_masuk.id_bahan = bahan.id_bahan');
	// 	$this->db->join('admin', 'admin.id_admin = masuk.id_admin');
	// 	$this->db->where('id_masuk', $id_masuk);
	// 	$ambil = $this->db->get('detail_masuk');
	// 	return $ambil->result_array();
	// }

	public function tampil_bahan($id_bahan)
	{
		$this->db->join('masuk', 'masuk.id_masuk = detail_masuk.id_masuk', 'left');
		$this->db->join('pemasok', 'pemasok.id_pemasok = detail_masuk.id_pemasok', 'left');
		$this->db->join('bahan', 'bahan.id_bahan = detail_masuk.id_bahan', 'left');
		$this->db->join('admin', 'admin.id_admin = masuk.id_admin', 'left');
		$this->db->where('detail_masuk.id_bahan', $id_bahan);
		$ambil = $this->db->get('detail_masuk');
		return $ambil->result_array();

	}

	public function tampil_masuk_bahan ($id_bahan, $bulan){
		$this->db->join('masuk', 'detail_masuk.id_masuk = masuk.id_masuk');
		$this->db->join('pemasok', 'detail_masuk.id_pemasok = pemasok.id_pemasok');
		$this->db->join('bahan', 'detail_masuk.id_bahan = bahan.id_bahan');
		$this->db->where('detail_masuk.id_bahan', $id_bahan);
		$this->db->like('tanggal_masuk', $bulan,'BOTH');
		$ambil = $this->db->get('detail_masuk');
		return $ambil->result_array();

	}

	public function tampil_pemasok ($id_pemasok)
	{
		$this->db->join('masuk', 'masuk.id_masuk = detail_masuk.id_masuk','left');
		$this->db->join('bahan', 'bahan.id_bahan = detail_masuk.id_bahan','left');
		$this->db->join('admin', 'admin.id_admin = masuk.id_admin','left');
		$this->db->where('id_pemasok', $id_pemasok);
		$ambil = $this->db->get('detail_masuk');
		return $ambil->result_array();
	}

	public function tampil_masuk_pemasok ($id_pemasok, $bulan){
		$this->db->join('masuk', 'detail_masuk.id_masuk = masuk.id_masuk');
		$this->db->join('pemasok', 'detail_masuk.id_pemasok = pemasok.id_pemasok');
		$this->db->join('bahan', 'detail_masuk.id_bahan = bahan.id_bahan');
		$this->db->where('detail_masuk.id_pemasok', $id_pemasok);
		$this->db->like('tanggal_masuk', $bulan,'BOTH');
		$ambil = $this->db->get('detail_masuk');
		return $ambil->result_array();

	}
	public function hitung_bahan ($id_bahan)
	{
		$ambil = $this->db->query("SELECT SUM(jumlah_detail_masuk) AS jumlah FROM detail_masuk WHERE id_bahan= '$id_bahan'");
		$data = $ambil->row_array();
		return $data['jumlah'];
	}
}

?>
