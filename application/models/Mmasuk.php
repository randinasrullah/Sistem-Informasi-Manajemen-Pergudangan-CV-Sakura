<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmasuk extends CI_Model
{
	public function tampil_masuk ()
	{
		$this->db->join("admin", "masuk.id_admin=admin.id_admin");
		$ambil = $this->db->get('masuk');
		return $ambil->result_array();
	}

	public function tampil_masuk_tanggal ($bulan)
	{
		$this->db->join("admin", "masuk.id_admin=admin.id_admin");
		$this->db->like("tanggal_masuk", $bulan, 'BOTH');
		$ambil = $this->db->get('masuk');
		return $ambil->result_array();
	}
	
	public function tampil_detail_masuk ($id_masuk)
	{
		$this->db->join('pemasok', 'detail_masuk.id_pemasok = pemasok.id_pemasok');
		$this->db->join('bahan', 'detail_masuk.id_bahan = bahan.id_bahan');
		$this->db->where('id_masuk', $id_masuk);
		$ambil = $this->db->get('detail_masuk');
		return $ambil->result_array();
	}

	public function tambah($inputan)
	{
		// membuat kondisi
		foreach ($inputan['data'] as $key => $value)
		{
			if (!empty($value['id_pemasok'])) {
				if (empty($value['jumlah_detail_masuk']) OR empty($value['harga_detail_masuk'])) {
					$cek[$key] = "batal";
				} else {
					$cek[$key] = "jadi";
				}
			} else {
				$cek[$key] = "kosong";
			}
		}

		// Data bisa diisi jika cek bukan kosong semua dan tidak daa yang isinya batal
		// Array diff mencocokan 2 data dan mengembalikan yang beda
		// Array intersect mencocokan 2 data dan mengembalikan yang sama

		$kosong_semua = array_diff($cek, array("kosong"));
		$ada_batal = array_intersect($cek, array("batal"));
		if (empty($kosong_semua) OR !empty($ada_batal)) 
		{
			return "gagal";
		}

		// 1. Menyimpan data ke tabel detail masuk
		// 1.a. Menyimpan data untuk di simpan ke tb masuk
		$data_admin = $this->session->userdata("admin");	
		$inputan_masuk['id_admin'] = $data_admin['id_admin'];
		$inputan_masuk['tanggal_masuk'] = $inputan['tanggal_masuk'];
		// 1. b Menyimpan data ke db
		$this->db->insert('masuk', $inputan_masuk);

		// 2. Menyimpan data ke Tabel detail masuk
		// 2.a. Menyiapkan data untuk di simpan
		// Mengambil id_masuk terbaru yang baru saja disimpan, Menggunakan fungsi insert_id()

		$id_masuk = $this->db->insert_id();
		$ubah_masuk['total_harga_masuk'] = 0;
		foreach ($inputan['data'] as $id_bahan => $inputan_detail) 
		{
			if (!empty($inputan_detail['id_pemasok']) AND !empty($inputan_detail['jumlah_detail_masuk']) AND !empty($inputan_detail['harga_detail_masuk']))
			{
				$inputan_detail['id_masuk'] = $id_masuk;
				$inputan_detail['id_bahan'] = $id_bahan;
				$inputan_detail['sub_harga_detail_masuk'] = $inputan_detail['jumlah_detail_masuk'] * $inputan_detail['harga_detail_masuk'];

				// echo "<pre>";
				// print_r($inputan_detail);
				// echo "</pre>";
				
				// 2.b. Menyimpan data ke db
				$this->db->insert('detail_masuk', $inputan_detail);
				// 2.c. Menjumlahkan total harga unutk di simpan ke tb masuk
				$ubah_masuk['total_harga_masuk'] += $inputan_detail['sub_harga_detail_masuk'];

			} 
		}

		// 3. Mengubah data total harga di tabel mausk
		$this->db->where('id_masuk', $id_masuk);
		$this->db->update('masuk', $ubah_masuk);
	}
	public function ubah_masuk ($inputan, $id_masuk)
	{
		$ubah_masuk['total_harga_masuk'] = 0;
		foreach ($inputan['data'] as $id_bahan => $inputan_detail) 
		{
			if (!empty($inputan_detail['id_pemasok']) AND !empty($inputan_detail['jumlah_detail_masuk']))
			{
				// mengambil data dan di cek
				$this->db->where('id_masuk', $id_masuk);
				$this->db->where('id_bahan', $id_bahan);
				$cek_detail = $this->db->get('detail_masuk');
				if ($cek_detail->num_rows() == 0) 
				{
					// Tambah
					$inputan_detail['id_masuk'] = $id_masuk;
					$inputan_detail['id_bahan'] = $id_bahan;
					$inputan_detail['sub_harga_detail_masuk'] = $inputan_detail['jumlah_detail_masuk'] * $inputan_detail['harga_detail_masuk'];
					$this->db->insert('detail_masuk', $inputan_detail);
				} else {
					// Ubah
					$inputan_detail['sub_harga_detail_masuk'] = $inputan_detail['jumlah_detail_masuk'] * $inputan_detail['harga_detail_masuk'];
					$this->db->where('id_masuk',$id_masuk);
					$this->db->where('id_bahan',$id_bahan);
					$this->db->update('detail_masuk',$inputan_detail);
				}
				$ubah_masuk['total_harga_masuk'] +=  $inputan_detail['sub_harga_detail_masuk'];
				$this->db->where('id_masuk', $id_masuk);
				$this->db->update('masuk', $ubah_masuk);

			}
		}
	}
	public function hapus_detail ($id_detail_masuk, $id_masuk)
	{
		$this->db->where('id_detail_masuk', $id_detail_masuk);
		$this->db->delete('detail_masuk');
		$masuk = $this->tampil_detail_masuk($id_masuk);
		$ubah_masuk['total_harga_masuk'] = 0;
		foreach ($masuk as $key => $value) 
		{
			$ubah_masuk['total_harga_masuk'] += $value['sub_harga_detail_masuk'];
		}
		$this->db->where('id_masuk',$id_masuk);
		$this->db->update('masuk',$ubah_masuk);
	}
	public function hapus_masuk ($id_masuk)
	{
		$this->db->where('id_masuk', $id_masuk);
		$this->db->delete('masuk');
	}
}
?>