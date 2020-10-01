<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_masuk extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("admin")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdetail_masuk");
	}

	public function index($id_masuk)
	{
		$data['detail_masuk'] = $this->Mdetail_masuk->tampil($id_masuk);
		
		$this->load->view('admin/header');
		$this->load->view('admin/masuk/tampildetailmasuk', $data);
		$this->load->view('admin/footer');

	}
}

?>
