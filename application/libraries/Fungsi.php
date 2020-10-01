<?php 

Class Fungsi 
{
	protected $ci;
	function __construct (){
		$this->ci =& get_instance();
	}
	function user_login ()
	{
		$this->ci->load->model('Mkepala');
		$id_kepala = $this->ci->session->userdata('id_kepala');
		$user_data = $this->ci->Mkepala->get($id_kepala)->row();
		return $user_data;
	}
	function user_login_admin ()
	{
		$this->ci->load->model('Madmin');
		$id_admin = $this->ci->session->userdata('id_admin');
		$user_data = $this->ci->Madmin->get($id_admin)->row();
		return $user_data;
	}
}
?>
