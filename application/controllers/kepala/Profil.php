<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_controller 
{
	function __construct ()
	{
		parent::__construct();
		if (!$this->session->userdata("kepala")) 
		{
			redirect ('', 'refresh');
		}

		$this->load->model("Mkepala");

	}

	public function index ()
	{	$data['user'] = $this->Mkepala->tampil_kepala();
		$data['kepala'] = $this->session->userdata("kepala");
		$data['pesan'] = "";
		$inputan = $this->input->post();
		if ($inputan)
		{
			if (empty($inputan['password_lama'])) 
			{
				$kirim['username_kepala'] = $inputan['username_kepala'];
				$kirim['password_kepala'] = $data['kepala']['password_kepala'];	
				$this->Mkepala->ubah_profil($kirim, $data['kepala']['id_kepala']);
				$this->session->set_flashdata('sukses_profil','<div class="alert alert-success">Profil Berhasil Diubah</div>');
				redirect('kepala/profil', 'refresh');
			} else {
				// jika password lama diisi,maka cek apakah password lama benar
				if(md5($inputan['password_lama'])==$data['kepala']['password_kepala'])
				{
					// PW baru dan pw konf tidak boleh kosong
					if (!empty($inputan['password_baru']) AND !empty($inputan['password_konfirmasi'])) {
						// Mencocokan pw baru dengan pw konfirmasi
						if ($inputan['password_baru']==$inputan['password_konfirmasi']) {

							$kirim['username_kepala'] = $inputan['username_kepala'];
							$kirim['password_kepala'] = md5($inputan['password_baru']);

							$this->Mkepala->ubah_profil($kirim, $data['kepala']['id_kepala']);
							$this->session->set_flashdata('sukses_profil', '<div class="alert alert-success">Profile Berhasil Diubah</div>');
							redirect('kepala/profil' , 'refresh');
						} else {
							$data['pesan'] = "pesan_3";
						}
					} else {
						$data['pesan'] = "pesan_2";
					}
				} else {
					$data['pesan'] = "pesan_1";
				}
			}
		}
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/profil',$data);
		$this->load->view('kepala/footer');
	}
}

?>