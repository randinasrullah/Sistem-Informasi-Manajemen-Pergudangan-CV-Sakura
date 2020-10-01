<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_controller 
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}

		$this->load->model("Madmin");
		$this->load->model("Mkepala");
	}

	public function index ()
	{
		$data["admin"] = $this->Madmin->tampil_admin();
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/admin/tampiladmin',$data);
		$this->load->view('kepala/footer');
	}

	public function tambah ()
	{
		// $this->library->load('session');
		// $alert = array('teks'=>'Inilah contoh penggunaan alert');
		// $this->session->set_flashdata($alert);
		// echo $this->session->flashdata('teks');

		// Membuat validasi di CI
		// 1. load library nya
		$data['user'] = $this->Mkepala->tampil_kepala();

		$this->load->library('form_validation');
		// $this->load->library('session');
		// membuat aturan
		$this->form_validation->set_rules('username_admin', 'Username', 'required|is_unique[admin.username_admin]');
		$this->form_validation->set_rules('password_admin', 'Password', 'required');
		// membuat pesan
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique', '%s sudah ada. Silahkan input ulang' );
		// Menjalankan validasi
		if ($this->form_validation->run() == TRUE) 
		{
			$this->Madmin->tambah($this->input->post());
			// $this->session->set_flashdata('data_tambah', ' <div class="alert alert-success"><h4> Data Berhasil ditambahkan <h4></div>');
			redirect('kepala/admin', 'refresh');
		}
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/admin/tambahadmin');
		$this->load->view('kepala/footer');
	}

	public function ubah ($id_admin)
	{	
		$data['user'] = $this->Mkepala->tampil_kepala();
		$data['admin'] = $this->Madmin->detail($id_admin);

		$this->load->library('form_validation');
		$inputan = $this->input->post();
		if ($inputan AND $inputan['username_admin']==$data['admin']['username_admin']) 
		{
			$this->form_validation->set_rules('username_admin', 'Username', 'required');
			
		} 
		else  
		{
			$this->form_validation->set_rules('username_admin','Username', 'required|is_unique[admin.username_admin]');
		}
			$this->form_validation->set_rules('password_admin', 'Password', 'required');

			// membuat pesan
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			$this->form_validation->set_message('is_unique', '%s sudah ada. Silahkan input ulang' );
			// Menjalankan validasi
			if ($this->form_validation->run() == TRUE) 
			{
				$this->Madmin->ubah($this->input->post(), $id_admin);
				// $this->session->set_flashdata('data_ubah', ' <div class="alert alert-warning"><h4> Data Berhasil diubah <h4></div>');
				redirect('kepala/admin', 'refresh');
			}
		
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/admin/ubahadmin', $data);
		$this->load->view('kepala/footer');
	}	
		
	
	public function hapus ($id_admin)
	{
		$this->Madmin->hapus($id_admin);
		// $this->session->set_flashdata('data_hapus', ' <div class="alert alert-danger"><h4> Data Berhasil dihapus <h4></div>');
		redirect('kepala/admin','refresh');
	}
	public function get($id = null)
	{
		$this->db->from('admin');
		if ($id !=null) {
				$this->db->where("id_admin", $id);
			}	
			$query = $this->db->get();
			return $query;
	}
}
?>