<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasok extends CI_controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model('Mpemasok');
		$this->load->model('Mdetail_masuk');
		$this->load->model("Mkepala");

	}
	public function index ()
	{
		$data['pemasok'] = $this->Mpemasok->tampil_pemasok();
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/pemasok/tampilpemasok',$data);
		$this->load->view('kepala/footer');
	}

	public function tambah ()
	{
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required|is_unique[pemasok.nama_pemasok]');
		// $this->form_validation->set_rules('telepon_pemasok', 'Nomor Pemasok', 'required|min_length[5]');
		$this->form_validation->set_rules('telepon_pemasok', 'Nomor Pemasok', 'required');
		$this->form_validation->set_rules('alamat_pemasok', 'Alamat Pemasok', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique','%s sudah ada. Silahkan input ulang');
		// $this->form_validation->set_message('min_length','{field} isi minimal 5 angka.');

		if ($this->form_validation->run() == TRUE)
		{
			$this->Mpemasok->tambah($this->input->post());
			redirect ('kepala/pemasok', 'refresh');
		}

		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/pemasok/tambahpemasok');
		$this->load->view('kepala/footer');
	}
	public function detail ($id_pemasok)
	{
		$data['detail']= $this->Mdetail_masuk->tampil_pemasok($id_pemasok);
		$this->load->view('kepala/header');
		$this->load->view('kepala/pemasok/detailpemasok', $data);
		$this->load->view('kepala/footer');
	}

	public function ubah ($id_pemasok)
	{
		$data['pemasok'] = $this->Mpemasok->detail($id_pemasok);
		$data['user'] = $this->Mkepala->tampil_kepala();

		$this->load->library('form_validation');
		$inputan = $this->input->post();
		if ($inputan AND $inputan['nama_pemasok']==$data['pemasok']['nama_pemasok'])
		{
			$this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required');
		}
		else
		{
			$this->form_validation->set_rules('nama_pemasok','Nama Pemasok', 'required|is_unique[pemasok.nama_pemasok]');
		}

		// $this->form_validation->set_rules('telepon_pemasok','Nomor Pemasok', 'required|min_length[5]');
		$this->form_validation->set_rules('telepon_pemasok','Nomor Pemasok', 'required');
		$this->form_validation->set_rules('alamat_pemasok','Alamat Pemasok', 'required');

		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		// $this->form_validation->set_message('min_length','{field} isi minimal 5 angka.');
		$this->form_validation->set_message('is_unique', '%s sudah ada. Silahkan input ulang');


		if ($this->form_validation->run() == TRUE)
		{
			$this->Mpemasok->ubah($this->input->post(), $id_pemasok);
			redirect ('kepala/pemasok', 'refresh');
		}
		
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/pemasok/ubahpemasok', $data);
		$this->load->view('kepala/footer');
	}
	public function hapus ($id_pemasok)
	{
		$this->Mpemasok->hapus($id_pemasok);
		redirect('kepala/pemasok','refresh');
	}

} 


?>