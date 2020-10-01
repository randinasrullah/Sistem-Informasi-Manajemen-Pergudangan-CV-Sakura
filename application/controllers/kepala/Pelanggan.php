<?php 

class Pelanggan extends CI_Controller
{

	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model('Mpelanggan');
		$this->load->model('Mdetail_distribusi');
		$this->load->model('Mkepala');

	}
	public function index ()
	{
		$data['pelanggan'] = $this->Mpelanggan->tampil_pelanggan();
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/pelanggan/tampilpelanggan',$data);
		$this->load->view('kepala/footer');
	}

	public function tambah ()
	{
		$data['user'] = $this->Mkepala->tampil_kepala();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|is_unique[pelanggan.nama_pelanggan]');
		$this->form_validation->set_rules('nomor_pelanggan', 'Nomor Pelanggan', 'required|min_length[5]');
		$this->form_validation->set_rules('alamat_pelanggan', 'Alamat Pelanggan', 'required');

		$this->form_validation->set_message('required','%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique', '%s sudah ada. Silahkan input ulang' );
		$this->form_validation->set_message('min_length','{field} isi minimal 5 angka.');

		if ($this->form_validation->run() == TRUE)
		{
			$this->Mpelanggan->tambah($this->input->post());
			redirect ('kepala/pelanggan', 'refresh');
		}

		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/pelanggan/tambahpelanggan');
		$this->load->view('kepala/footer');
	}
	public function detail ($id_pelanggan)
	{
		$data['detail'] = $this->Mdetail_distribusi->tampil_pelanggan($id_pelanggan);
		$this->load->view('kepala/header');
		$this->load->view('kepala/pelanggan/detailpelanggan', $data);
		$this->load->view('kepala/footer');
	}
	public function ubah ($id_pelanggan)
	{
		$data['pelanggan'] = $this->Mpelanggan->detail($id_pelanggan);
		$data['user'] = $this->Mkepala->tampil_kepala();

		$this->load->library('form_validation');
		$inputan = $this->input->post();
		if ($inputan AND $inputan['nama_pelanggan']==$data['pelanggan']['nama_pelanggan'])
		{
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
		}
		else
		{
			$this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan', 'required|is_unique[pelanggan.nama_pelanggan]');
		}
		$this->form_validation->set_rules('nomor_pelanggan','Nomor Pelanggan', 'required|min_length[5]');
		$this->form_validation->set_rules('alamat_pelanggan','Alamat Pelanggan', 'required');

		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique', '%s sudah ada. Silahkan input ulang');
		$this->form_validation->set_message('min_length','{field} isi minimal 5 angka.');


		if ($this->form_validation->run() == TRUE)
		{
			$this->Mpelanggan->ubah($this->input->post(), $id_pelanggan);
			redirect ('kepala/pelanggan', 'refresh');
		}
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/pelanggan/ubahpelanggan', $data);
		$this->load->view('kepala/footer');
	}
	public function hapus ($id_pelanggan)
	{
		$this->Mpelanggan->hapus($id_pelanggan);
		redirect('kepala/pelanggan','refresh');
	}
}
?>

