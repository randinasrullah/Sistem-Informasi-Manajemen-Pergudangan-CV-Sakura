<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index ()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		$this->form_validation->set_message('required', '%s harus diisi');

		if ($this->form_validation->run() == TRUE)
		{
			$inputan = $this->input->post();
			$this->load->model('Mlogin');
			$hasil = $this->Mlogin->login_user($inputan);

			if($hasil=="sukses_login_kepala")
			{
				redirect ('kepala','refresh');
			} elseif ($hasil=='sukses_login_admin') 
			{
				redirect ('admin','refresh');
			} elseif ($hasil=='salah_password') 
			{
				$this->session->set_flashdata('salah_password','<p><small><i class="text-danger">Password Salah</i></small></p>' );
				redirect ('','refresh');
			} elseif ($hasil== 'salah_username')
			{
				$this->session->set_flashdata('salah_username','<p><small><i class="text-danger">Username Salah</i></small></p>');
			}

		}
		$this->load->view('login');
	}
}

?>
