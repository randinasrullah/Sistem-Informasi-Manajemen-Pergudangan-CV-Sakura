<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_produksi extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("admin")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdetail_produksi");
	}

	public function index($id_produksi)
	{
		$data['detail_produksi'] = $this->Mdetail_produksi->tampil($id_produksi);
		$this->load->view('admin/header');
		$this->load->view('admin/produksi/tampildetailproduksi', $data);
		$this->load->view('admin/footer');

	}
}

?>