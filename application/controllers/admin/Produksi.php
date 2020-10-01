<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_controller 
{
	function __construct ()
	{
		parent::__construct ();
		if (!$this->session->userdata("admin")) 
		{
			redirect ('', 'refresh');
		}

		$this->load->model("Mproduksi");
		$this->load->model('Mbahan');
		$this->load->model("Mdetail_produksi");

	}

	public function index ()
	{
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

		$this->load->view('admin/header');
		$this->load->view('admin/produksi/tampilproduksi',$data);
		$this->load->view('admin/footer');
	}
	public function tambah ()
	{	
		
		// echo "<pre>";
		// print_r($inputan);
		// echo "</pre>";
		
		$data['bahan'] = $this->Mbahan->tampil_bahan();	
		$inputan = $this->input->post();
		if ($inputan) {
			$this->Mproduksi->tambah($inputan);
			redirect ('admin/produksi', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/produksi/tambahproduksi',$data);
		$this->load->view('admin/footer');
	}
	public function ubah ($id_produksi)
	{

		
		$data['id_produksi'] = $id_produksi;
		$data['bahan'] = $this->Mbahan->tampil_bahan();
		$data['produksi'] = $this->Mproduksi->detail_produksi($id_produksi);
		$dp = $this->Mdetail_produksi->tampil($id_produksi);
		foreach ($data['bahan'] as $key => $value)
		 {
			foreach ($dp as $key_dp => $value_dp) 
			{
				if ($value['id_bahan']==$value_dp['id_bahan'])
				{
					$data['bahan'][$key] = $value_dp;
					$data['dp'][$key] = $value_dp;
				}
			}
		}

		$inputan =$this->input->post();
		if($inputan){
			$this->Mproduksi->ubah_produksi($inputan, $id_produksi);
			redirect('admin/produksi', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/produksi/ubahproduksi', $data);
		$this->load->view('admin/footer');
		
		// $data['id_produksi'] = $id_produksi;
		// $data['bahan'] = $this->Mbahan->tampil_bahan();
		// $detail = $this->Mproduksi->tampil_detail_produksi($id_produksi);
		// foreach ($data['bahan'] as $key_b => $value_b) 
		// {
		// 	foreach ($detail as $key_d => $value_d) 
		// 	{
		// 		if ($value_d['id_bahan']==$value_b['id_bahan'])
		// 		{
		// 			$data['bahan'][$key_b] = $value_d;
		// 		}
		// 	}
		// }
		// $inputan =$this->input->post();
		// if($inputan){
		// 	$this->Mproduksi->ubah_produksi($inputan, $id_produksi);
		// 	redirect('admin/produksi', 'refresh');
		// }
		// $this->load->view('admin/header');
		// $this->load->view('admin/produksi/ubahproduksi', $data);
		// $this->load->view('admin/footer');
	}
	public function hapus_detail($id_produksi, $id_detail_produksi)
	{
		$this->Mproduksi->hapus_detail($id_detail_produksi, $id_produksi);
		redirect('admin/produksi/ubah/' .$id_produksi,'refresh');
	}

	public function hapus_produksi($id_produksi)
	{
		$this->Mproduksi->hapus_produksi($id_produksi);
		redirect('admin/produksi','refresh');
	}
}

?>