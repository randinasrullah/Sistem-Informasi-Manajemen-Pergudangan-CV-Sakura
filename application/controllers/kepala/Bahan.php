<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model('Mbahan');
		$this->load->model("Mkepala");
	}

	public function index ()
	{
		$data['bahan'] = $this->Mbahan->tampil_bahan();
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/bahan/tampilbahan',$data);
		$this->load->view('kepala/footer');
	}

	public function tambah ()

	{
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_bahan','Nama bahan', 'required|is_unique[bahan.nama_bahan]');
		$this->form_validation->set_rules('minimal_stok','Stok Minimal', 'required');
		$this->form_validation->set_rules('masa_kadaluarsa','Masa Kadaluarsa', 'required');


		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique', '%s sudah ada. Silahkan input ulang');



		if ($this->form_validation->run() == TRUE)
		{
			$this->Mbahan->tambah($this->input->post());
			redirect('kepala/bahan', 'refresh');
		}


		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/bahan/tambahbahan');
		$this->load->view('kepala/footer');
	}
	public function detail($id_bahan)
	{
		$this->load->model("Mdetail_masuk");
		$this->load->model("Mdetail_keluar");
		$data['user'] = $this->Mkepala->tampil_kepala();
		$data['masuk'] = $this->Mdetail_masuk->tampil_bahan($id_bahan);
		$data['keluar'] = $this->Mdetail_keluar->tampil_bahan($id_bahan);
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/bahan/detailbahan', $data);
		$this->load->view('kepala/footer');

	}

	public function ubah ($id_bahan)
	{
		$data['bahan'] = $this->Mbahan->detail($id_bahan);
		$data['user'] = $this->Mkepala->tampil_kepala();

		$this->load->library('form_validation');
		$inputan = $this->input->post();
		if ($inputan AND $inputan['nama_bahan']==$data['bahan']['nama_bahan']) 
		{
			$this->form_validation->set_rules('nama_bahan', 'Nama Bahan', 'required');
		} 
		else 
		{
			$this->form_validation->set_rules('nama_bahan', 'Nama Bahan', 'required|is_unique[bahan.nama_bahan]');
		}
			$this->form_validation->set_rules('minimal_stok','Stok Minimal', 'required');
			$this->form_validation->set_rules('masa_kadaluarsa','Masa Kadaluarsa', 'required');


			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			$this->form_validation->set_message('is_unique', '%s sudah ada. Silahkan input ulang');

			if ($this->form_validation->run() == TRUE)
			{
				$this->Mbahan->ubah($this->input->post(), $id_bahan);
				redirect ('kepala/bahan', 'refresh');
			}
	
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/bahan/ubahbahan', $data);
		$this->load->view('kepala/footer');
	}

	public function hapus($id_bahan)
	{
		$this->Mbahan->hapus($id_bahan);
		redirect ("kepala/bahan", 'refresh');
	} 
}



?>