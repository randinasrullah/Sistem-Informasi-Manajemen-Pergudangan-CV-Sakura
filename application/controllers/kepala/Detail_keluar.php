<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_keluar extends CI_controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdetail_keluar");
		$this->load->model('Mkepala');
	}

	public function index($id_keluar)
	{
		$data['detail_keluar'] = $this->Mdetail_keluar->tampil($id_keluar);
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/keluar/tampildetailkeluar', $data);
		$this->load->view('kepala/footer');
	}
	public function bahan($id_bahan, $tanggal=null)
	{
		$data['detail_keluar'] = $this->Mdetail_keluar->tampil_keluar_bahan($id_bahan, $tanggal);
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/keluar/tampildetailkeluarbahan',$data);
		$this->load->view('kepala/footer');

	}
}
?>