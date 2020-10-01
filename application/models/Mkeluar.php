<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkeluar extends CI_Model
{
	public function tampil_keluar ()
	{	
		$this->db->join("admin","keluar.id_admin=admin.id_admin");
		$ambil = $this->db->get('keluar');
		return $ambil->result_array();
	}

	public function tampil_keluar_tanggal ($bulan)
	{
		$this->db->join("admin", "keluar.id_admin=admin.id_admin");
		$this->db->like("tanggal_keluar", $bulan, 'BOTH');
		$ambil = $this->db->get('keluar');
		return $ambil->result_array();
	}

	public function tampil_detail_keluar ($id_keluar)
	{
		
		$this->db->join('bahan', 'detail_keluar.id_bahan = bahan.id_bahan');
		$this->db->where('id_keluar', $id_keluar);
		$ambil = $this->db->get('detail_keluar');
		return $ambil->result_array();
	}
	public function tambah($inputan)
	{
		
		// 1. Menyimpan data ke tabel detail keluar
		// 1.a. Menyimpan data untuk di simpan ke tb keluar
		$data_admin = $this->session->userdata("admin");
		$inputan_keluar['id_admin'] = $data_admin['id_admin'];
		$inputan_keluar['tanggal_keluar'] = $inputan['tanggal_keluar'];
		// 1. b Menyimpan data ke db
		$this->db->insert('keluar', $inputan_keluar);

		// 2. Menyimpan data ke Tabel detail keluar
		// 2.a. Menyiapkan data untuk di simpan
		// Mengambil id_keluar terbaru yang baru saja disimpan, Menggunakan fungsi insert_id()

		$id_keluar = $this->db->insert_id();
		foreach ($inputan['data'] as $id_bahan => $inputan_detail) 
		{
			if (!empty($inputan_detail['jumlah_detail_keluar'])) 
			{
				$inputan_detail['id_keluar'] = $id_keluar;
				$inputan_detail['id_bahan'] = $id_bahan;
				

				// echo "<pre>";
				// print_r($inputan_detail);
				// echo "</pre>";
				
				// 2.b. Menyimpan data ke db
				$this->db->insert('detail_keluar', $inputan_detail);

			}
		}

		$this->db->where('id_keluar', $id_keluar);	
	}

	public function ubah_keluar ($inputan, $id_keluar)
	{
		foreach ($inputan['data'] as $id_bahan => $inputan_detail) 
		{
			if (!empty($inputan_detail['jumlah_detail_keluar']))
			{
				// mengambil data dan di cek
				$this->db->where('id_keluar', $id_keluar);
				$this->db->where('id_bahan', $id_bahan);
				$cek_detail = $this->db->get('detail_keluar');
				if ($cek_detail->num_rows() == 0) 
				{
					// Tambah
					$inputan_detail['id_keluar'] = $id_keluar;
					$inputan_detail['id_bahan'] = $id_bahan;
		
					$this->db->insert('detail_keluar', $inputan_detail);
				} else {
					// Ubah
					
					$this->db->where('id_keluar',$id_keluar);
					$this->db->where('id_bahan',$id_bahan);
					$this->db->update('detail_keluar',$inputan_detail);
				}
				
				$this->db->where('id_keluar', $id_keluar);
			}
		}
	}
	public function hapus_detail ($id_detail_keluar, $id_keluar)
	{
		$this->db->where('id_detail_keluar', $id_detail_keluar);
		$this->db->delete('detail_keluar');
		

		$this->db->where('id_keluar',$id_keluar);
		
	}
	public function hapus_keluar ($id_keluar)
	{
		$this->db->where('id_keluar', $id_keluar);
		$this->db->delete('keluar');
	}
}
?>