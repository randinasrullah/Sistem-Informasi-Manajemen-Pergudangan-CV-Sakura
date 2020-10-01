<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_controller 
{
	function __construct ()
	{
		parent::__construct ();

		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
	}

	public function index ()
	{	
		$this->load->model('Mbahan');
		$this->load->model("Mbahan");
		$this->load->model("Mdetail_masuk");
		$this->load->model("Mdetail_keluar");
		$this->load->model('Mpelanggan');
		$this->load->model('Mpemasok');
		$this->load->model('Mproduksi');
		$this->load->model('Mdistribusi');
		$this->load->model("Madmin");
		// $this->load->model("Mkepala");
		

		$data['bahan'] = count($this->Mbahan->tampil_bahan());
		$data['pelanggan'] = count($this->Mpelanggan->tampil_pelanggan());
		$data['pemasok'] = count($this->Mpemasok->tampil_pemasok());
		$data['admin'] = count($this->Madmin->tampil_admin());
		$data['produksi'] = $this->Mproduksi->hitung_produksi();
		$data['distribusi'] = $this->Mdistribusi->hitung_distribusi();
		// $data['user'] = $this->Mkepala->tampil_kepala();

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

		}

		$data['produksi'] = $this->Mproduksi->hitung_produksi();
		$data['distribusi'] = $this->Mdistribusi->hitung_distribusi();
		
		$this->load->view('kepala/header');
		$this->load->view('kepala/index',$data);
		$this->load->view('kepala/footer');
	}
		
	
}
?>