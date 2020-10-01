<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_controller
{
	function __construct ()
	{
		parent:: __construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mkeluar");
		$this->load->model("Mbahan");
		$this->load->model("Mdetail_keluar");
		$this->load->model('Mkepala');

	}

	public function index ()
	{
		$data['user'] = $this->Mkepala->tampil_kepala();
		for ($i=2019; $i <= date("Y") ; $i++) 
		{ 
			$data['tahun'][$i] = $i;
		}
		$data['bulan']['01'] = "Januari";
		$data['bulan']['02'] = "Februari";
		$data['bulan']['03'] = "Maret";
		$data['bulan']['04'] = "April";
		$data['bulan']['05'] = "Mei";
		$data['bulan']['06'] = "Juni";
		$data['bulan']['07'] = "Juli";
		$data['bulan']['08'] = "Agustus";
		$data['bulan']['09'] = "September";
		$data['bulan']['10'] = "Oktober";
		$data['bulan']['11'] = "November";
		$data['bulan']['12'] = "Desember";

		
		$inputan = $this->input->post();
		if ($inputan) {
			$data['tahun_terpilih'] = $inputan['tahun'];
			$data['bulan_terpilih'] = $inputan['bulan'];
			$data['url'] = $inputan['tahun']."-".$inputan['bulan'];
			$data["keluar"] = $this->Mkeluar->tampil_keluar_tanggal($inputan['tahun']."-".$inputan['bulan']);
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			$data["keluar"] = $this->Mkeluar->tampil_keluar();
		}
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/keluar/tampilkeluar',$data);
		$this->load->view('kepala/footer');
	}
	public function bahan()
	{
		$data['user'] = $this->Mkepala->tampil_kepala();
		
		for ($i=2019; $i <= date("Y") ; $i++) 
		{ 
			$data['tahun'][$i] = $i;
		}
		$data['bulan']['01'] = "Januari";
		$data['bulan']['02'] = "Februari";
		$data['bulan']['03'] = "Maret";
		$data['bulan']['04'] = "April";
		$data['bulan']['05'] = "Mei";
		$data['bulan']['06'] = "Juni";
		$data['bulan']['07'] = "Juli";
		$data['bulan']['08'] = "Agustus";
		$data['bulan']['09'] = "September";
		$data['bulan']['10'] = "Oktober";
		$data['bulan']['11'] = "November";
		$data['bulan']['12'] = "Desember";


		$data["bahan"] = $this->Mbahan->tampil_bahan();
		$inputan = $this->input->post();
		if ($inputan) {
			$data['tahun_terpilih'] = $inputan['tahun'];
			$data['bulan_terpilih'] = $inputan['bulan'];
			$data['url'] = $inputan['tahun']."-".$inputan['bulan'];
			foreach ($data['bahan'] as $key => $value) {
				$detail = $this->Mdetail_keluar->tampil_keluar_bahan($value['id_bahan'], $inputan['tahun']."-".$inputan['bulan']);
				// mencari total
				// 1. Membuat wadah penampung sub total yang isinya masih kosong
				$total[$value['id_bahan']] = array();
				// 2. Memperulangkan data yang nantinya akan di jumlahkan
				foreach ($detail as $key_d => $value_d) {
					// diambil sub nya saja per bahan. lalu disimpan di $total yang mempunyai indix id_bahan dan index urutan biasa
					$total[$value['id_bahan']][] = $value_d['jumlah_detail_keluar'];
				}
				// menjumlahkan total yang berisi sub nya tadi menggunakan fungsi array_sum
				$data['bahan'][$key]['total'] = array_sum($total[$value['id_bahan']]);
			}
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			foreach ($data["bahan"] as $key => $value) {
				$detail = $this->Mdetail_keluar->tampil_bahan($value['id_bahan']);
				$total[$value['id_bahan']] = array();
				foreach ($detail as $key_d => $value_d) {
					$total[$value['id_bahan']][] = $value_d['jumlah_detail_keluar'];
				}
				$data['bahan'][$key]['total'] = array_sum($total[$value['id_bahan']]);
			}
		}
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/keluar/tampilkeluarbahan',$data);
		$this->load->view('kepala/footer');
	}
}

 ?>