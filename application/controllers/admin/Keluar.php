<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_controller 
{
	function __construct ()
	{
		parent::__construct ();
		if(!$this->session->userdata('admin'))
		{
			redirect ('','refresh');
		}

		$this->load->model('Mkeluar');
		$this->load->model("Mbahan");
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
			$data["keluar"] = $this->Mkeluar->tampil_keluar_tanggal($inputan['tahun']."-".$inputan['bulan']);
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			$data["keluar"] = $this->Mkeluar->tampil_keluar();
		}
		$this->load->view('admin/header');
		$this->load->view('admin/keluar/tampilkeluar',$data);
		$this->load->view('admin/footer');
	}
	
	public function tambah ()
	{
		$data['bahan'] = $this->Mbahan->tampil_bahan();
		$inputan = $this->input->post();
		if ($inputan) {
			$this->Mkeluar->tambah($inputan);
			redirect ('admin/keluar', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/keluar/tambahkeluar',$data);
		$this->load->view('admin/footer');
	}

	public function ubah ($id_keluar)
	{
		$data['id_keluar'] = $id_keluar;
		$data['bahan'] = $this->Mbahan->tampil_bahan();
		$detail = $this->Mkeluar->tampil_detail_keluar($id_keluar);
		foreach ($data['bahan'] as $key_b => $value_b) 
		{
			foreach ($detail as $key_d => $value_d) 
			{
				if ($value_d['id_bahan']==$value_b['id_bahan'])
				{
					$data['bahan'][$key_b] = $value_d;
				}
			}
		}

		$inputan =$this->input->post();
		if($inputan){
			$this->Mkeluar->ubah_keluar($inputan, $id_keluar);
			redirect('admin/keluar', 'refresh');
		}
		$this->load->view('admin/header');
		$this->load->view('admin/keluar/ubahkeluar', $data);
		$this->load->view('admin/footer');
	}
	public function hapus_detail($id_keluar, $id_detail_keluar)
	{
		$this->Mkeluar->hapus_detail($id_detail_keluar, $id_keluar);
		redirect('admin/keluar/ubah/' .$id_keluar,'refresh');
	}
	public function hapus_keluar($id_keluar)
	{
		$this->Mkeluar->hapus_keluar($id_keluar);
		redirect('admin/keluar','refresh');
	}
}

?>