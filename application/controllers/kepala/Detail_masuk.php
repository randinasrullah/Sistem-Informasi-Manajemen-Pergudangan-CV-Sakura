<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_masuk extends CI_Controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model("Mdetail_masuk");
		$this->load->model('Mkepala');

	}

	public function index($id_masuk)
	{
		$data['detail_masuk'] = $this->Mdetail_masuk->tampil($id_masuk);
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/masuk/tampildetailmasuk', $data);
		$this->load->view('kepala/footer');

	}

	public function bahan($id_bahan, $tanggal=null)
	{
		$data['detail_masuk'] = $this->Mdetail_masuk->tampil_masuk_bahan($id_bahan, $tanggal);
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/masuk/tampildetailmasukbahan',$data);
		$this->load->view('kepala/footer');

	}
	public function pemasok($id_pemasok, $tanggal=null)
	{
		$data['detail_masuk'] = $this->Mdetail_masuk->tampil_masuk_pemasok($id_pemasok, $tanggal);
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/masuk/tampildetailmasukpemasok',$data);
		$this->load->view('kepala/footer');

	}
}

?>
