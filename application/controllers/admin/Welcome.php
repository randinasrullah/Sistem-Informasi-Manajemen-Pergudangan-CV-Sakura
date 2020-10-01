<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_controller 
{
	function __construct ()
	{
		parent::__construct ();

		if (!$this->session->userdata("admin")) 
		{
			redirect ('', 'refresh');
		}
	}
	
	public function index ()
	{

		$this->load->model("Mbahan");
		$this->load->model("Mdetail_masuk");
		$this->load->model("Mdetail_keluar");
		$this->load->model("Mproduksi");
		$this->load->model("Mdistribusi");
		$this->load->model("Mperhitungan");

		$bahan = $this->Mbahan->tampil_bahan();
		foreach ($bahan as $key => $value)
		{
			$hdm = $this->Mdetail_masuk->hitung_bahan($value['id_bahan']);
			$data['masuk'][$key]['bahan'] = $value['nama_bahan'];
			$data['masuk'][$key]['satuan'] = $value['satuan_bahan'];
			$data['masuk'][$key]['jumlah'] = $hdm;

			$hdk = $this->Mdetail_keluar->hitung_bahan($value['id_bahan']);
			$data['keluar'][$key]['bahan'] = $value['nama_bahan'];
			$data['keluar'][$key]['satuan'] = $value['satuan_bahan'];
			$data['keluar'][$key]['jumlah'] = $hdk;

			$data['stok'][$key]['bahan'] = $value['nama_bahan'];
			$data['stok'][$key]['safety_stok'] = $value['minimal_stok'];
			$data['stok'][$key]['satuan'] = $value['satuan_bahan'];
			$data['stok'][$key]['jumlah'] = $hdm - $hdk;

			if (!empty($hdm)) 
			{
				$dh = $this->Mperhitungan->hitung($value['id_bahan'], date("Y-m-d"));

			$data['ramalan'][$key]['bahan'] = $value['nama_bahan'];
			if (isset($dh['ramalan_akhir'])) {
				$data['ramalan'][$key]['jumlah'] = $dh['ramalan_akhir'];
			} else {
				$data['ramalan'][$key]['jumlah'] = '0';
			}
		
			
			} else {
				$data['ramalan'][$key]['bahan'] = $value['nama_bahan'];
				$data['ramalan'][$key]['jumlah'] = "0";
			}
			
		}

		$data['produksi'] = $this->Mproduksi->hitung_produksi();
		$data['distribusi'] = $this->Mdistribusi->hitung_distribusi();
		

		$this->load->view('admin/header',$data);
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
}
?>