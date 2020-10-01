<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_produksi extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdetail_produksi");
		$this->load->model('Mkepala');

	}

	public function index($id_produksi)
	{
		$data['detail_produksi'] = $this->Mdetail_produksi->tampil($id_produksi);
		$data['user'] = $this->Mkepala->tampil_kepala();


		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/produksi/tampildetailproduksi', $data);
		$this->load->view('kepala/footer');

	}
}

?>