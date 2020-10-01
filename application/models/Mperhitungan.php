<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mperhitungan extends CI_Model
{
	public function data($id_bahan, $tanggal_masuk)
	{
		$this->db->join('masuk', 'detail_masuk.id_masuk = masuk.id_masuk');
		$this->db->order_by('id_detail_masuk', 'asc');
		$this->db->where('id_bahan', $id_bahan);
		$this->db->where('masuk.tanggal_masuk <', $tanggal_masuk);
		$ambil = $this->db->get('detail_masuk');
		$data = $ambil->result_array();
		// Mengambil jumlah masuk dan tangggal masuk nya saja
		foreach ($data as $key => $value) 
		{
			$data_masuk[$key]['tanggal'] = $value['tanggal_masuk'];
			$data_masuk[$key]['jumlah'] = $value['jumlah_detail_masuk'];
		}
		
		// mengambil 30 data terakhir saja, menggunakan fungsi array_slice
		if (isset($data_masuk)) 
		{
			$potong_data = array_slice($data_masuk, -30, 30);
		} else {
			$potong_data = "";
		}
		return $potong_data;
		
	}

	public function hitung($id_bahan, $tanggal_cek)
	{
		$weighted = 5;
		$data = $this->data($id_bahan, $tanggal_cek);

		if(empty($data) OR count($data) <=$weighted){
			return "gagal";
		}
		// echo "<pre>";
		// print_r($weighted);
		// print_r($data);
		// echo "</pre>";

		// Operasi Perhitungan Rumus
		// Membaut variabel untuk menampung data

		$t_pembelian = 0;
		$t_peramalan = 0;
		$t_error = 0;
		$t_mad = 0;
		$t_mse = 0;
		$t_mape = 0;
		$r_error = 0;
		$r_mad = 0;
		$r_mse = 0;
		$r_mape = 0;

		// Mulai menghitung 
		// Data di ambil dari inputan 
		// key menyimpan variabel yang akan di tampilkan
		// value ntuk menyimpan hasil perhitungan
		foreach ($data as $key => $value) {
			$hitung[$key]['tanggal'] = $value['tanggal'];
			$hitung[$key]['pembelian'] = $value['jumlah'];
			// jika key kurang dari 5, maka perhitungan masih kosong
			if ($key < $weighted) {
				$hitung[$key]['peramalan'] = 0;
				$hitung[$key]['error'] = 0;
				$hitung[$key]['mad'] = 0;
				$hitung[$key]['mse'] = 0;
				$hitung[$key]['mape'] = 0;
			} else {
				// membuat data awal yaitu 0
				$total = 0;
				// lalu membuat perulangan 5 data sebelumnya
				for ($i=($key-1); $i > (($key-1)- $weighted); $i--){
					// menjumlahkan 5 data sebelumnya menggunakan tanda +=
					$total += $data[$i]['jumlah'];
				}
				// peramalan $total/5
				$hitung[$key]['peramalan'] = $total/$weighted;
				// error = pembelian - peramalan
				$hitung[$key]['error'] = $hitung[$key]['pembelian']-$hitung[$key]['peramalan'];
				// Menghitung minus dari hasil error
				$hitung[$key]['mad'] = abs($hitung[$key]['error']);
				// MSE = hasil error pangkat 2
				$hitung[$key]['mse'] = pow($hitung[$key]['error'], 2);
				// map = hasil mad / pembelian
				$hitung[$key]['mape'] = ($hitung[$key]['mad']/$hitung[$key]['pembelian'])*100;
			}

			// menjumlahkan semua data
			$t_pembelian += $hitung[$key]['pembelian'];
			$t_peramalan += $hitung[$key]['peramalan'];
			$t_error += $hitung[$key]['error'];
			$t_mad += $hitung[$key]['mad'];
			$t_mse += $hitung[$key]['mse'];
			$t_mape += $hitung[$key]['mape'];
			// menghitung rata - rata
			$r_error = $t_error/(count($data)- $weighted);
			$r_mad = $t_mad/(count($data)- $weighted);
			$r_mse = $t_mse/(count($data)- $weighted);
			$r_mape = $t_mape/(count($data)- $weighted);
		}
			 // echo "<pre>";
			 // print_r($hitung);
			 // echo "</pre>";
			
		// mengambil 5 data terakhir menggunakan fungsi array_slice
		$data_akhir = array_slice($hitung, - $weighted, $weighted, true);
		// menjumlahkan 5 data terakhir
		$total_akhir = 0;
		foreach ($data_akhir as $key => $value) {
			$total_akhir += $value['pembelian'];
		}
		// menghitung rata - rata 5 data terakhir
		$ramalan_akhir = $total_akhir/$weighted;
		// menaruh semua hasil perhitungan di dalam variabel hasil
		$hasil['hitung'] = $hitung;
		$hasil['t_pembelian'] = $t_pembelian;
		$hasil['t_peramalan'] = $t_peramalan;
		$hasil['t_error'] = $t_error;
		$hasil['t_mad'] = $t_mad;
		$hasil['t_mse'] = $t_mse;
		$hasil['t_mape'] = $t_mape;
		$hasil['r_error'] = $r_error;
		$hasil['r_mad'] = $r_mad;
		$hasil['r_mse'] = $r_mse;
		$hasil['r_mape'] = $r_mape;
		$hasil['ramalan_akhir'] = $ramalan_akhir;

		// echo "<pre>";
		// print_r($hasil);
		// echo"</pre>";

		// mengembalikan hasil perhitungan ke controller
		return $hasil;
	}

}
?>