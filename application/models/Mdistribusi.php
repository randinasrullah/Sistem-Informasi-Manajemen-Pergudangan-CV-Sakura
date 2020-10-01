<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdistribusi extends CI_Model
{
	public function tampil_distribusi ()
	{
		$this->db->join("admin", "distribusi.id_admin=admin.id_admin");
		$ambil = $this->db->get('distribusi');
		return $ambil->result_array();
	}

	public function tampil_detail_distribusi ($id_distribusi)
	{
		$this->db->join('pelanggan', 'detail_distribusi.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->where('id_distribusi', $id_distribusi);
		$ambil = $this->db->get('detail_distribusi');
		return $ambil->result_array();
	}
	public function tampil_distribusi_tanggal ($bulan)
	{
		$this->db->join("admin", "distribusi.id_admin=admin.id_admin");
		$this->db->like("tanggal_distribusi", $bulan, 'BOTH');
		$ambil = $this->db->get('distribusi');
		return $ambil->result_array();
	}

	public function tambah($inputan)
	{
		
		// 1. Menyimpan data ke tabel detail distribusi
		// 1.a. Menyimpan data untuk di simpan ke tb distribusi
		$data_admin = $this->session->userdata("admin");	
		$inputan_distribusi['id_admin'] = $data_admin['id_admin'];
		$inputan_distribusi['tanggal_distribusi'] = $inputan['tanggal_distribusi'];
		// 1. b Menyimpan data ke db
		$this->db->insert('distribusi', $inputan_distribusi);

		// 2. Menyimpan data ke Tabel detail distribusi
		// 2.a. Menyiapkan data untuk di simpan
		// Mengambil id_distribusi terbaru yang baru saja disimpan, Menggunakan fungsi insert_id()

		$id_distribusi = $this->db->insert_id();
		$ubah_distribusi['jumlah_distribusi'] = 0;
		foreach ($inputan['data'] as $id_pelanggan => $inputan_detail) 
		{
			if (!empty($inputan_detail['jumlah_detail_distribusi'])) 
			{
				$inputan_detail['id_pelanggan'] = $id_pelanggan;
				$inputan_detail['id_distribusi'] = $id_distribusi;
				

				// echo "<pre>";
				// print_r($inputan_detail);
				// echo "</pre>";
				
				// 2.b. Menyimpan data ke db
				$this->db->insert('detail_distribusi', $inputan_detail);
				// 2.c. Menjumlahkan total harga unutk di simpan ke tb distribusi
				$ubah_distribusi['jumlah_distribusi'] += $inputan_detail['jumlah_detail_distribusi'];

			}
		}

		// 3. Mengubah data total harga di tabel distribusi
		$this->db->where('id_distribusi', $id_distribusi);
		$this->db->update('distribusi', $ubah_distribusi);
	}
	public function ubah_distribusi ($inputan, $id_distribusi)
	{
		$ubah_distribusi['jumlah_distribusi'] = 0;
		foreach ($inputan['data'] as $id_pelanggan => $inputan_detail) 
		{
			if (!empty($inputan_detail['jumlah_detail_distribusi']))
			{
				// mengambil data dan di cek
				$this->db->where('id_distribusi', $id_distribusi);
				$this->db->where('id_pelanggan', $id_pelanggan);
				$cek_detail = $this->db->get('detail_distribusi');
				if ($cek_detail->num_rows() == 0) 
				{
					// Tambah
					$inputan_detail['id_distribusi'] = $id_distribusi;
					$inputan_detail['id_pelanggan'] = $id_pelanggan;
					
					$this->db->insert('detail_distribusi', $inputan_detail);
				} else {
					// Ubah
					$this->db->where('id_distribusi',$id_distribusi);
					$this->db->where('id_pelanggan',$id_pelanggan);
					$this->db->update('detail_distribusi',$inputan_detail);
				}
				$ubah_distribusi['jumlah_distribusi'] += $inputan_detail['jumlah_detail_distribusi'];
				$this->db->where('id_distribusi', $id_distribusi);
				$this->db->update('distribusi', $ubah_distribusi);

			}
		}
	}
	public function hapus_detail ($id_detail_distribusi, $id_distribusi)
	{
		$this->db->where('id_detail_distribusi', $id_detail_distribusi);
		$this->db->delete('detail_distribusi');
		$distribusi = $this->tampil_detail_distribusi($id_distribusi);
		$ubah_distribusi['jumlah_distribusi'] = 0;
		foreach ($distribusi as $key => $value) 
		{
			$ubah_distribusi['jumlah_distribusi'] += $value['jumlah_detail_distribusi'];
		}
		$this->db->where('id_distribusi',$id_distribusi);
		$this->db->update('distribusi',$ubah_distribusi);
	}
	public function hitung_distribusi ()
	{
		$ambil = $this->db->query("SELECT SUM(jumlah_distribusi) AS jumlah FROM distribusi");
		$data = $ambil->row_array();
		return $data['jumlah'];
	}
	public function hapus_distribusi ($id_distribusi)
	{
		$this->db->where('id_distribusi', $id_distribusi);
		$this->db->delete('distribusi');
	}
}
?>