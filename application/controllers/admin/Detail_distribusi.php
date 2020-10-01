<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_distribusi extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("admin")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdetail_distribusi");
	}

	public function index($id_distribusi)
	{
		$data['detail_distribusi'] = $this->Mdetail_distribusi->tampil($id_distribusi);
		$this->load->view('admin/header');
		$this->load->view('admin/distribusi/tampildetaildistribusi', $data);
		$this->load->view('admin/footer');

	}
}

?>