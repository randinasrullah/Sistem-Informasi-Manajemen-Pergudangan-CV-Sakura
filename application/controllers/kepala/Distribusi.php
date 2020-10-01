<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_controller
{
	function __construct ()
	{
		parent:: __construct();

		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdistribusi");
		$this->load->model("Mpelanggan");
		$this->load->model("Mdetail_distribusi");
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
			$data["distribusi"] = $this->Mdistribusi->tampil_distribusi_tanggal($inputan['tahun']."-".$inputan['bulan']);
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			$data["distribusi"] = $this->Mdistribusi->tampil_distribusi();
		}
		
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/distribusi/tampildistribusi',$data);
		$this->load->view('kepala/footer');
	}

	public function pelanggan()
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


		$data["pelanggan"] = $this->Mpelanggan->tampil_pelanggan();
		$inputan = $this->input->post();
		if ($inputan) {
			$data['tahun_terpilih'] = $inputan['tahun'];
			$data['bulan_terpilih'] = $inputan['bulan'];
			$data['url'] = $inputan['tahun']."-".$inputan['bulan'];
			foreach ($data['pelanggan'] as $key => $value) {
				$detail = $this->Mdetail_distribusi->tampil_distribusi_pelanggan($value['id_pelanggan'], $inputan['tahun']."-".$inputan['bulan']);
				// mencari total
				// 1. Membuat wadah penampung sub total yang isinya masih kosong
				$total[$value['id_pelanggan']] = array();
				// 2. Memperulangkan data yang nantinya akan di jumlahkan
				foreach ($detail as $key_d => $value_d) {
					// diambil sub nya saja per pelanggan. lalu disimpan di $total yang mempunyai indix id_pelanggan dan index urutan biasa
					$total[$value['id_pelanggan']][] = $value_d['jumlah_detail_distribusi'];
				}
				// menjumlahkan total yang berisi sub nya tadi menggunakan fungsi array_sum
				$data['pelanggan'][$key]['total'] = array_sum($total[$value['id_pelanggan']]);
			}
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			foreach ($data["pelanggan"] as $key => $value) {
				$detail = $this->Mdetail_distribusi->tampil_pelanggan($value['id_pelanggan']);
				$total[$value['id_pelanggan']] = array();
				foreach ($detail as $key_d => $value_d) {
					$total[$value['id_pelanggan']][] = $value_d['jumlah_detail_distribusi'];
				}
				$data['pelanggan'][$key]['total'] = array_sum($total[$value['id_pelanggan']]);
			}
		}
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/distribusi/tampildistribusipelanggan',$data);
		$this->load->view('kepala/footer');
	}

}
?>