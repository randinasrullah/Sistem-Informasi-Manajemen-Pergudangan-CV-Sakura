<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_controller 
{
	function __construct ()
	{
		parent::__construct ();
		if (!$this->session->userdata("admin")) 
		{
			redirect ('', 'refresh');
		}

		$this->load->model("Mdistribusi");
		$this->load->model("Mpelanggan");

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
			$data["distribusi"] = $this->Mdistribusi->tampil_distribusi_tanggal($inputan['tahun']."-".$inputan['bulan']);
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			$data["distribusi"] = $this->Mdistribusi->tampil_distribusi();
		}
		
		$this->load->view('admin/header');
		$this->load->view('admin/distribusi/tampildistribusi',$data);
		$this->load->view('admin/footer');
	}

	public function tambah ()
	{
		$data['pelanggan'] = $this->Mpelanggan->tampil_pelanggan();
		$inputan = $this->input->post();
		if ($inputan) {
			$this->Mdistribusi->tambah($inputan);
			redirect ('admin/distribusi', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/distribusi/tambahdistribusi',$data);
		$this->load->view('admin/footer');
	}

	public function ubah ($id_distribusi)
	{
		$data['id_distribusi'] = $id_distribusi;
		$data['pelanggan'] = $this->Mpelanggan->tampil_pelanggan();
		$detail = $this->Mdistribusi->tampil_detail_distribusi($id_distribusi);
		foreach ($data['pelanggan'] as $key_p => $value_p) 
		{
			foreach ($detail as $key_d => $value_d) 
			{
				if ($value_d['id_pelanggan']==$value_p['id_pelanggan'])
				{
					$data['pelanggan'][$key_p] = $value_d;
				}
			}
		}
		$inputan =$this->input->post();
		if($inputan){
			$this->Mdistribusi->ubah_distribusi($inputan, $id_distribusi);
			redirect('admin/distribusi', 'refresh');
		}
		$this->load->view('admin/header');
		$this->load->view('admin/distribusi/ubahdistribusi', $data);
		$this->load->view('admin/footer');
	}
	public function hapus_detail($id_distribusi, $id_detail_distribusi)
	{
		$this->Mdistribusi->hapus_detail($id_detail_distribusi, $id_distribusi);
		redirect('admin/distribusi/ubah/' .$id_distribusi,'refresh');
	}	
	public function hapus_distribusi ($id_distribusi)
	{
		$this->Mdistribusi->hapus_distribusi($id_distribusi);
		redirect("admin/distribusi", "refresh");
	}
}
?>