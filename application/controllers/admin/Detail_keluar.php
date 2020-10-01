<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_keluar extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("admin")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdetail_keluar");
	}

	public function index($id_keluar)
	{
		$data['detail_keluar'] = $this->Mdetail_keluar->tampil($id_keluar);
		$this->load->view('admin/header');
		$this->load->view('admin/keluar/tampildetailkeluar', $data);
		$this->load->view('admin/footer');

	}
}

?>