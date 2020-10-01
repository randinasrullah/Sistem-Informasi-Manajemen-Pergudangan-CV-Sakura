<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_distribusi extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdetail_distribusi");
		$this->load->model("Mkepala");

	}

	public function index($id_distribusi)
	{
		$data['detail_distribusi'] = $this->Mdetail_distribusi->tampil($id_distribusi);
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/distribusi/tampildetaildistribusi', $data);
		$this->load->view('kepala/footer');

	}
	public function pelanggan($id_pelanggan, $tanggal=null)
	{
		$data['detail_distribusi'] = $this->Mdetail_distribusi->tampil_distribusi_pelanggan($id_pelanggan, $tanggal);
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/distribusi/tampildetaildistribusipelanggan',$data);
		$this->load->view('kepala/footer');

	}
}

?>