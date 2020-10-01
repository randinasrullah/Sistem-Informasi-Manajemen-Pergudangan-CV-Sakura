<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduksi extends CI_Model
{
	public function tampil_produksi()
	{
		$this->db->join("admin", "produksi.id_admin=admin.id_admin");
		$ambil = $this->db->get('produksi');
		return $ambil->result_array();
	}

	public function tampil_detail_produksi ($id_produksi)
	{
		$this->db->join('bahan', 'detail_produksi.id_bahan = bahan.id_bahan');
		$this->db->where('id_produksi', $id_produksi);
		$ambil = $this->db->get('detail_produksi');
		return $ambil->result_array();
	}
	public function tampil_produksi_tanggal ($bulan)
	{
		$this->db->join("admin", "produksi.id_admin=admin.id_admin");
		$this->db->like("tanggal_produksi", $bulan, 'BOTH');
		$ambil = $this->db->get('produksi');
		return $ambil->result_array();
	}

	public function detail_produksi($id_produksi)
	{
		$this->db->where('id_produksi', $id_produksi);
		$ambil = $this->db->get('produksi');
		return $ambil->row_array();
	}
	
	public function tambah ($inputan)
	{
		// 1. Menyimpan data ke tabel detail produksi
		// 1.a. Menyimpan data untuk di simpan ke tb produksi
		$data_admin = $this->session->userdata("admin");	
		$inputan_produksi['id_admin'] = $data_admin['id_admin'];
		$inputan_produksi['tanggal_produksi'] = $inputan['tanggal_produksi'];
		$inputan_produksi['jumlah_produksi'] = $inputan['jumlah_produksi'];
		// 1. b Menyimpan data ke db
		$this->db->insert('produksi', $inputan_produksi);

		// 2. Menyimpan data ke Tabel detail produksi
		// 2.a. Menyiapkan data untuk di simpan
		// Mengambil id_produksi terbaru yang baru saja disimpan, Menggunakan fungsi insert_id()

		$id_produksi = $this->db->insert_id();
		foreach ($inputan['data'] as $id_bahan => $inputan_detail) 
		{
			if (!empty($inputan_detail['jumlah_detail_produksi'])) 
			{
				$inputan_detail['id_bahan'] = $id_bahan;
				$inputan_detail['id_produksi'] = $id_produksi;
				

				// echo "<pre>";
				// print_r($inputan_detail);
				// echo "</pre>";
				
				// 2.b. Menyimpan data ke db
				$this->db->insert('detail_produksi', $inputan_detail);
			}
		}
	}

	public function ubah_produksi ($inputan, $id_produksi)
	{

		foreach ($inputan['data'] as $id_bahan => $inputan_detail) 
		{
			if (!empty($inputan_detail['jumlah_detail_produksi']))
			{
				// mengambil data dan di cek
				$this->db->where('id_produksi', $id_produksi);
				$this->db->where('id_bahan', $id_bahan);
				$cek_detail = $this->db->get('detail_produksi');
				if ($cek_detail->num_rows() == 0) 
				{
					// Tambah
					$inputan_detail['id_produksi'] = $id_produksi;
					$inputan_detail['id_bahan'] = $id_bahan;

					$this->db->insert('detail_produksi', $inputan_detail);
				} else {
					// Ubah
					$this->db->where('id_produksi',$id_produksi);
					$this->db->where('id_bahan',$id_bahan);
					$this->db->update('detail_produksi',$inputan_detail);
				}
				$inputan_produksi['jumlah_produksi'] = $inputan['jumlah_produksi'];
				$this->db->where('id_produksi', $id_produksi);
				$this->db->update('produksi', $inputan_produksi);

			}
		}
	}
	public function hapus_detail ($id_detail_produksi, $id_produksi)
	{
		$this->db->where('id_detail_produksi', $id_detail_produksi);
		$this->db->delete('detail_produksi');
		
		
		$this->db->where('id_produksi',$id_produksi);
	}
	public function hapus_produksi($id_produksi)
	{
		$this->db->where('id_produksi', $id_produksi);
		$this->db->delete('produksi');
		
	}
	public function hitung_produksi ()
	{
		$ambil = $this->db->query("SELECT SUM(jumlah_produksi) AS jumlah FROM produksi");
		$data = $ambil->row_array();
		return $data['jumlah'];
	}
}

?>