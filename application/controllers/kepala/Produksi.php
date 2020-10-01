<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_controller
{
	function __construct ()
	{
		parent::__construct ();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model('Mproduksi');
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
			$data["produksi"] = $this->Mproduksi->tampil_produksi_tanggal($inputan['tahun']."-".$inputan['bulan']);
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			$data["produksi"] = $this->Mproduksi->tampil_produksi();
		}
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/produksi/tampilproduksi',$data);
		$this->load->view('kepala/footer');
	}
}
?>