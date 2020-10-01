<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_controller
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}
		$this->load->model('Mbahan');
		$this->load->model("Mperhitungan");
	}

	public function index ()
	{
		$data['bahan'] = $this->Mbahan->tampil_bahan();
		$input = $this->input->post();

		if ($input) {
			$data['id_bahan'] = $input['id_bahan'];
			$data['tanggal_cek'] = $input['tanggal_cek'];	
			$data['hasil'] = $this->Mperhitungan->hitung($data['id_bahan'], $data['tanggal_cek']);

			if ($data['hasil']=="gagal") 
			{
				echo "<script>alert('Data tidak bisa dihitung')</script>";
				redirect('kepala/perhitungan','refresh');
			}		
		} else {
			$data['id_bahan'] = "";
			$data['tanggal_cek'] = "";
		}
		
		$this->load->view('kepala/header');
		$this->load->view('kepala/perhitungan/tampilperhitungan',$data);
		$this->load->view('kepala/footer');
	}

}
?>