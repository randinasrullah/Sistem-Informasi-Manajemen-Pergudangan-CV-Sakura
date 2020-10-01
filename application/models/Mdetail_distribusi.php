<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdetail_distribusi extends CI_Model
{
	public function tampil ($id_distribusi)
	{
		$this->db->join('pelanggan', 'detail_distribusi.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->where('id_distribusi', $id_distribusi);
		$ambil = $this->db->get('detail_distribusi');
		return $ambil->result_array();
	}
	public function tampil_pelanggan ($id_pelanggan)
	{
		$this->db->join('distribusi', 'distribusi.id_distribusi = detail_distribusi.id_distribusi','left');
		$this->db->join('admin', 'admin.id_admin = distribusi.id_admin','left');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$ambil = $this->db->get('detail_distribusi');
		return $ambil->result_array();
	}

	public function tampil_distribusi_pelanggan ($id_pelanggan, $bulan){
		$this->db->join('distribusi', 'detail_distribusi.id_distribusi = distribusi.id_distribusi');
		$this->db->join('pelanggan', 'detail_distribusi.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->where('detail_distribusi.id_pelanggan', $id_pelanggan);
		$this->db->like('tanggal_distribusi', $bulan,'BOTH');
		$ambil = $this->db->get('detail_distribusi');
		return $ambil->result_array();

	}
}

?>